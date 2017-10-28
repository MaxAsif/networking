<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addtag;
use App\Alumni;

class AddtagController extends Controller
{
    public function index()
    {
    	
    	Addtag::create([
    			'alum_id' => request('alumid'),
    			
    			'tags' => request('tag'),

    		]);

    	$alumni = Alumni::get();
    	$message = 'Tag has been added succesfully';
    	return back();
    	
   	}
}
