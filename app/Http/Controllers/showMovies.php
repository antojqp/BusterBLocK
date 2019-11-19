<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class showMovies extends Controller
{
    //
    public function show()
    {
        # code...
        $row = 0;
        $movies = DB::table('movies')->paginate(5);
    
        return view('index', compact('movies' , 'row'));
    }
}
