<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{

	public function __construct(Request $request)
	{
		$this->middleware('guest:' . $request->user_type);
	}

    /**
     * Show the user account dashboard depending on type.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($user_type, $extra = null)
    {
        $main_wrapper_class = 'inner dashboard dashboard-';
		$main_container_css = 'salon-pro dashboard dashboard-';
		switch($user_type){
			case 'client':
				$main_wrapper_class .= 'owner';
				$main_container_css .= 'client';
			break;
			case 'owner':
				$main_wrapper_class .= 'owner';
				$main_container_css .= 'owner';
			break;
			case 'professional':
				$main_wrapper_class .= 'pro';
				$main_container_css .= 'pro';
			break;
		}
		$is_spa = true;
	    return view(
	    	'frontsite.spa.master', 
	    	compact(
	    		'is_spa', 
	    		'user_type', 
	    		'main_wrapper_class',
	    		'main_container_css'
	    	)
	    );
    }
}
