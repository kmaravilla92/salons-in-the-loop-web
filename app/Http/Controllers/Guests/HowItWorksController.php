<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HowItWorksController extends Controller
{
    public function __invoke(Request $request)
    {
    	$user_type = session('sitl.user.type');
    	switch($user_type)
    	{
    		case 'client':
    			$section = 'clients';
    		break;
    		case 'owner':
    			$section = 'salon-owners';
    		break;
    		case 'professional':
    			$section = 'professionals';
    		break;
    		default:
    			$section = 'none';
    		break;
    	}

    	return view(
    		'frontsite.pages.guests.how-it-works',
    		compact('section')
    	);
    }
}
