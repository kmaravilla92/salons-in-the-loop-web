<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function __invoke()
    {
    	return view('frontsite.pages.guests.about-us');
    }
}
