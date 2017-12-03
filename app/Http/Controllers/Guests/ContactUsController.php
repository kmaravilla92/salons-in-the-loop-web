<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HttpClient;

class ContactUsController extends Controller
{

    protected $http_client;

    public function __construct(HttpClient $http_client)
    {
        $this->http_client = $http_client;
    }

    public function __invoke()
    {
    	return view('frontsite.pages.guests.contact-us');
    }

    public function postSendInquiry(Request $request)
    {   
        $response = $this->http_client->post('contact-us', [
            'form_params' => $request->only([
                'contact.first_name', 
                'contact.last_name', 
                'contact.email', 
                'contact.number', 
                'contact.message'
            ])
        ]);

        $response_body = json_decode($response->getBody(), true);
        $response_body['clear_form'] = true;
    	return response()->json($response_body);
    }
}
