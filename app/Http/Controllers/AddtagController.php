<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;

class AddtagController extends Controller
{
    public function index()
    {
    	$alumni = Alumni::get();
    	return view('addtag',compact('alumni'));
    }
}
