<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\smember ;
class AccessController extends Controller
{
    public function index(){
    	$smembers  = smember::get();
    	return view('access',compact('smembers')) ;   }
}
