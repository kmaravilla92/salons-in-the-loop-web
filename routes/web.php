<?php

use Illuminate\Http\Request;
use App\Services\HttpClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/api-test', function (HttpClient $http_client) {
	$response = $http_client->request('GET','info');
    return $response->getBody();
});

Route::group(['prefix'=>'api'], function () {
	Route::get('/oauth/authorize', function (Request $request) {
		$query = http_build_query([
	        'client_id' => 7,
	        'redirect_uri' => route('api.oauth.callback'),
	        'response_type' => 'code',
	        'scope' => '',
	    ]);

    	return redirect('http://api.sitl.dev/oauth/authorize?'.$query);
	});

	Route::get('/oauth/callback', function (Request $request, HttpClient $http_client) {
	    $response = $http_client->post('http://api.sitl.dev/oauth/token', [
	        'form_params' => [
	            'grant_type' => 'authorization_code',
	            'client_id' => 7,
	            'client_secret' => 'AOVGCWqcClysT6jK3svGO7r1OLFUY08PyMG8DCw2',
	            'redirect_uri' => route('api.oauth.callback'),
	            'code' => $request->code,
	        ],
	    ]);

	    return json_decode((string) $response->getBody(), true);
	})->name('api.oauth.callback');
});

/**
* Guest Pages
* Legends
* TD = Templating Done
*/
Route::namespace('Guests')->group(function () {
	Route::get('/', function () {
		return redirect(
			route('frontsite.guests.home')
		);
	})->name('frontsite.guests.home'); // TD

	Route::get('/home', 'HomeController')->name('frontsite.guests.home'); // TD
	Route::get('terms-and-conditions', 'TermsController')->name('frontsite.guests.terms-and-conditions'); // TD
	Route::get('privacy-policy', 'PrivacyController')->name('frontsite.guests.privacy-policy');
	Route::get('how-it-works', 'HowItWorksController')->name('frontsite.guests.how-it-works'); // TD
	Route::get('contact-us', 'ContactUsController')->name('frontsite.guests.contact-us'); // TD
	Route::post('contact-us', 'ContactUsController@postSendInquiry')->name('frontsite.guests.contact-us.post'); // TD
	Route::get('about-us', 'AboutUsController')->name('frontsite.guests.about-us'); // TD

	Route::prefix('blog')->group(function () {
		Route::get('/', 'BlogController@getList')->name('frontsite.guests.blog'); // TD
		Route::get('/{slug}', 'BlogController@getShow')->name('frontsite.guests.blog.show'); // TD
	});

	Route::prefix('user-registration')->group(function () {
		Route::get('step-1', 'UserRegistrationController@getStep1')->name('frontsite.guests.user-registration.step-1'); // TD
		Route::any('check-user-type', 'UserRegistrationController@anyCheckUserType')->name('frontsite.guests.user-registration.check-user-type'); // TD
		Route::get('step-2/{type}', 'UserRegistrationController@getStep2')->name('frontsite.guests.user-registration.step-2'); // TD
		Route::post('register', 'UserRegistrationController@postRegister')->name('frontsite.guests.user-registration.register'); // TD
		Route::get('step-3/{type}', 'UserRegistrationController@getStep3')->name('frontsite.guests.user-registration.step-3'); // TD
	});

	Route::post('authenticate-user', 'UserAuthController@postAuthenticate')->name('frontsite.guests.user-auth.authenticate');
	Route::get('logout-user', 'UserAuthController@getLogout')->name('frontsite.guests.user-auth.logout');

	Route::get('profile-view/{user_id}/{user_type?}', 'UserProfileController');
	Route::get('profile-view/{user_id}/{user_type?}/request-profile-view', 'UserProfileController@getRequestProfileView')->name('frontsite.guests.request-profile-view');
	Route::get('profile-view/{user_id}/{user_type?}/request-profile-view/{profile_request_view_id}/cancel', 'UserProfileController@getRequestProfileViewCancel')->name('frontsite.guests.request-profile-view.cancel');

	Route::get('professionals/search', 'SearchProfessionalController');

	Route::group(['prefix'=>'auth/social'], function(){
	    Route::get('/set-info/{driver?}/{user_type?}','SocialAuthController@setInfo')->name('auth.social.set-info');
	    Route::get('/redirect','SocialAuthController@redirect')->name('auth.social.redirect');
	    Route::get('/callback','SocialAuthController@callback')->name('auth.social.callback');
	});
});

Route::get('account/{user_type}{extra?}', 'AccountController')->name('frontsite.user.account');

Route::get('admin', function(){
	return view('backsite.master');
})->name('backsite');

Route::get('clear-cache', function(){
	\Cache::flush();
});

Auth::routes();
