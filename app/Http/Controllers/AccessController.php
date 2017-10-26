<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index(){
    	$smembers  = access::get();
    	return view('access',compact('smembers'))    }
}
