<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class crud extends Controller
{

    function index(){
        return view('index');
    }

    function add(Request $request){
        return $request->all();
    }

}
