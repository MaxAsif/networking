<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addtag;
use App\Alumni;

class AddtagController extends Controller
{
    public function index()
    {
    	dd($_POST);
    	Addtag::create([
    			'alum_id' => request('alumid'),
    			
    			'tags' => request('tag'),

    		]);
    	$message = 'Tag has been added succesfully';
    	redirect('/viewdata',compact('message'));
    	
   	}
}
