<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Tagslist;
class AlumniController extends Controller
{
    public function index()
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'industry' => 'required',
        ]);
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
        $message = 'Alumni has been added to databse succesfully!';
        return view('addalumni',compact('message'));
    }
    public function get()
    {
        $alumni = Alumni::get();
        $message = '';
        $tags = Tagslist::get();
    
        return view('viewdata',compact('alumni','message','tags'));
    }
}
  