<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControl extends Controller
{
    //this will check if the user is registered and it will send data to the page
 

    public function Stablish()
    {
		//$level = Auth::level();
    $user = Auth::user();
		return compact('user');

    }
}
