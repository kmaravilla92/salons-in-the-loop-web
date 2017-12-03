<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HttpClient;
use Sentinel;

class UserAuthController extends Controller
{

    protected $http_client;

    public function __construct(HttpClient $http_client)
    {
        $this->http_client = $http_client;
    }

    public function postAuthenticate(Request $request){
        $response = [
            'messages' => [],
            'success' => false,
            'clear_form' => false,
            'redirect_to' => false,
            'type' => 'error'
        ];

        try{
            $sentinel_user = Sentinel::authenticate(
                $request->input('auth')
            );

            if(!$sentinel_user){
                throw new \Exception('Incorrect account credentials!');
            }

            // $response['messages'][] = 'Successfully logged in!';
            $response['success'] = true;
            $response['type'] = 'success';
            $response['clear_form'] = false;

            foreach(['client','owner','professional'] as $role){
                if($sentinel_user->hasAccess($role)){

                    $api_user_request = $this->http_client->get('rest/users/'.$sentinel_user->id);
                    $api_user = json_decode($api_user_request->getBody()->getContents(), true);
                    
                    session([
                        'sitl' => [
                            'user' => array_merge([
                                'id' => $sentinel_user->id,
                                'type' => $role
                            ],$api_user)
                        ],
                    ]);

                    if(env('FIREBASE_ENABLED')){
                        $this->http_client->get('set-presence/'.$sentinel_user->id.'/true');
                    }

                    $response['redirect_to'] = route('frontsite.user.account', [
                        'user_type' => $role
                    ]).'#dashboard';
                    break;
                }
            }

        }catch(\Exception $e){
            $response['messages'][] = $e->getMessage();
        }

        return response()->json($response);
    }

    public function getLogout()
    {
        $sentinel_user = Sentinel::getUser();
        if(env('FIREBASE_ENABLED')){
            $this->http_client->get('set-presence/'.$sentinel_user->id.'/false');
        }
        Sentinel::logout();
        session(['sitl' => null]);
        return redirect()->to(
            route('frontsite.guests.home')
        );
    }
}
