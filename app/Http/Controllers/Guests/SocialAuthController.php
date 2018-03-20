<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Repositories\User as UserRepository;
use App\Services\HttpClient;
use Illuminate\Http\Request;
use Sentinel;
use Session;
use Socialite;

class SocialAuthController extends Controller
{

    protected $http_client;

    public function __construct(HttpClient $http_client)
    {
        $this->http_client = $http_client;
    }

    public function setInfo($driver = 'facebook', $user_type = 'client', Request $request)
    {
        session([
            'social.auth.user_type' => $user_type,
            'social.auth.driver' => $driver
        ]);

        return redirect(
            route('auth.social.redirect')
        );
    }
    
    public function redirect(Request $request)
    {
        $driver = session('social.auth.driver');
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Request $request)
    {
        $user_type = session('social.auth.user_type');
        $roles = [
            $user_type => true
        ];
        $user = Socialite::driver(session('social.auth.driver'))->user();
        $userDetails = [];
        $userDetails['name'] = $user->name;
        $userName = explode(' ', $userDetails['name']);
        $userDetails['first_name'] = $userName[0];
        $userDetails['last_name'] = end($userName);
        if(isset($user->email)) {
            $userDetails['email'] = $user->email;
        }else{
            $userDetails['email'] = $user->id.'@facebook.com';
        }
        $userDetails['password'] = $user->id;

        $user = \App\User::where('email',$userDetails['email'])->first();
        $sentinel_user = null;
        if($user){
            $sentinel_user = Sentinel::findById($user->id);
        }
        
        if($user_type == 'unidentified'){
            if(!$sentinel_user){
                Session::flash('toastr', [
                    'error' => 'Social account not found. Please register first.'
                ]);
                return redirect(
                    route('frontsite.guests.home')
                );
            }
        }
        
        if($sentinel_user){
            $roles_to_check = ['client','professional','owner'];
            foreach($roles_to_check as $role_to_check){
                if($sentinel_user->hasAccess($role_to_check) && $role_to_check != $user_type && $user_type !='unidentified'){
                    Session::flash('toastr', [
                        'error' => 'You social account has already been registered as a '. (ucfirst($role_to_check)).'. Registering as a '.ucfirst($user_type).' is prohibited.'
                    ]);
                    return redirect(
                        route('frontsite.guests.home')
                    );
                }else{
                    if($sentinel_user->hasAccess($role_to_check)){
                        Sentinel::login($sentinel_user);
                        $api_user_request = $this->http_client->get('rest/users/'.$sentinel_user->id);
                        $api_user = json_decode($api_user_request->getBody()->getContents(), true);
                        session([
                            'sitl' => [
                                'user' => array_merge([
                                    'id' => $sentinel_user->id,
                                    'type' => $role_to_check
                                ],$api_user)
                            ],
                        ]);
                        return redirect(
                            route('frontsite.user.account', [
                                'user_type' => $role_to_check
                            ]).'#dashboard'
                        );
                    }      
                }
            }
        }

        $request->merge([
            'user' => array_merge([
                'type' => $user_type,
            ], $userDetails)
        ]);
        
        $api_response = $this->http_client->post('rest/users', [
            'form_params' => $request->only([
                'user.type',
                'user.first_name', 
                'user.last_name', 
                'user.email', 
                'user.phone_number', 
                'user.password'
            ])
        ]);

        Sentinel::login($sentinel_user);
        session([
            'sitl' => [
                'user' => [
                    'id' => $sentinel_user->id,
                    'type' => $user_type
                ]
            ],
        ]);
        
        return redirect(
            route('frontsite.user.account', [
                'user_type' => $user_type
            ]).'#dashboard'
        );
    }
}
