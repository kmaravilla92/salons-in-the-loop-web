<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HttpClient;
use Cache;

class UserRegistrationController extends Controller
{

    protected $http_client;

    protected $user_registration_types;

    public function __construct(HttpClient $http_client)
    {
        $this->http_client = $http_client;

        $this->user_registration_types =  Cache::remember('user_registration_types', 60, function () {
            return array_keys(config('options.user.registration.types'));
        });
    }

    public function getStep1()
    {
    	return view('frontsite.pages.guests.user_registration.step-1');
    }

    public function postCheckUserType(Request $request)
    {
    	$type = $request->input('user.type');

    	$this->validateUserType($type);
        
    	return redirect(
    		route('frontsite.guests.user-registration.step-2', [
    			'type' => $type
    		])
    	);
    }

    public function getStep2($type, Request $request)
    {
    	$this->validateUserType($type);

        $type_details = config('options.user.registration.types.' . $type);

    	return view(
    		'frontsite.pages.guests.user_registration.step-2',
    		compact(
    			'type',
                'type_details'
    		)
    	);
    }

    public function postRegister(Request $request){
        $user = $request->input('user');
        $type = $user['type'];
        $response = [
            'messages' => [],
            'success' => false,
            'clear_form' => false,
            'redirect_to' => false,
            'timeOut' => 2000,
            'type' => 'error'
        ];
        try{
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
            $response = json_decode($api_response->getBody(), true);
            $response['clear_form'] = true;
            $response['type'] = 'success';
            $response['redirect_to'] = route('frontsite.guests.user-registration.step-3', [
                'type' => $type
            ]);
        }catch(\Exception $e){
            $api_response = $e->getResponse();
            $api_response_body = json_decode($api_response->getBody(), true);
            if($api_response->getStatusCode() == 422){
                $response['messages'][] = $api_response_body;
            }else{
                $response['messages'][] = $e->getMessage();
            }
            
        }

        return response()->json($response);
    }

    public function getStep3($type, Request $request)
    {
        $this->validateUserType($type);

        $type_details = config('options.user.registration.types.' . $type);

        return view(
            'frontsite.pages.guests.user_registration.step-3',
            compact(
                'type',
                'type_details'
            )
        );
    }

    protected function validateUserType($type = null)
    {
        if(!in_array($type, $this->user_registration_types)){
            dd('Invalid user type');
        }
    }
}
