<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HttpClient;
use Exception;
use Session;

class UserProfileController extends Controller
{
	public function __construct(HttpClient $http_client)
	{
		$this->http_client = $http_client;
	}

	public function __invoke(Request $request, $user_id, $user_type = null)
	{
		$profile = [];
		if(is_null($user_type)){
			$user_type = 'owner';
		}

		try{
			$api_response = $this->http_client->get('rest/users/' . $user_id);
			$api_response_body = json_decode($api_response->getBody(), true);
			$profile = $api_response_body;
			// dd($profile);
		}catch(Exception $e){
			dd($e->getMessage());
		}

		$relationship = $this->_getRelationship($user_type, $profile);

		$is_private = $relationship['is_private'];
		$profile_view_request = $relationship['profile_view_request'];
		$is_self_viewing = $this->isSelfViewing($user_id);
		
		return view(
			'frontsite.pages.guests.user.profile', 
			compact(
				'profile',
				'user_type',
				'is_private',
				'profile_view_request',
				'is_self_viewing'
			)
		);
	}

	public function getRequestProfileView($user_id, $user_type, Request $request)
	{
		try{
			$api_response = $this
								->http_client
								->post(
									'rest/users/' . $user_id . '/profile-view-requests', 
									[
										'form_params' => [
											'client_id' => $user_id,
											'viewer_id' => session('sitl.user.id'),
											'status' => '0'
										]
									]
								);
			$api_response_body = json_decode($api_response->getBody(), true);
			$profile_view_request = $api_response_body;
			Session::put('toaster', [
				'success' => 'Request successfully sent.'
			]);
			return back();
		}catch(Exception $e){
			dd($e->getMessage());
		}
	}

	public function getRequestProfileViewCancel($user_id, $user_type, $profile_request_view_id, Request $request)
	{
		try{
			$api_response = $this
								->http_client
								->delete('rest/users/' . $user_id . '/profile-view-requests/' . $profile_request_view_id);
			$api_response_body = json_decode($api_response->getBody(), true);
			$profile_view_request = $api_response_body;
			Session::put('toaster', [
				'success' => 'Request successfully sent.'
			]);
			return back();
		}catch(Exception $e){
			dd($e->getMessage());
		}
	}

	protected function _getRelationship($user_type, $user_profile)
	{
		$is_private = true;
		$profile_view_request = null;
		$user_id = $user_profile['id'];
		$current_user_id = session('sitl.user.id');
		
		if($user_id == $current_user_id){
			return false;
		}

		if(in_array($user_type, ['client'])){
			if(!is_null($current_user_id)){
				try{
					$api_response = $this
										->http_client
										->get('rest/users/' . $user_id . '/profile-view-requests/check/' . $current_user_id);
					$api_response_body = json_decode($api_response->getBody(), true);
					$profile_view_request = $api_response_body;
					if(!is_null($profile_view_request) && $profile_view_request['status'] == '1'){
						$is_private = false;
					}
				}catch(Exception $e){
					dd($e->getMessage());
				}
			}
		}else{
			$is_private = false;
		}

		return [
			'is_private' => $is_private,
			'profile_view_request' => $profile_view_request
		];
	}

	protected function isSelfViewing($profile_id)
	{
		$sentinel_user = \Sentinel::getUser();
		return isset($sentinel_user) && $sentinel_user->id == $profile_id;
	}
}