<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
class AlumniController extends Controller
{
    public function index()
    {
    	Alumni::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'address' => request('address'),
    		'city' => request('city'),
    		'country' => request('country'),
    		'mobile' => request('mobile'),
    		'dob' => request('dob'),
    		'industry' => request('industry'),

    	]);
    }
    public function get()
    {
        $alumni = Alumni::get();
        return view('addtag',compact('alumni'));
    }
}
  