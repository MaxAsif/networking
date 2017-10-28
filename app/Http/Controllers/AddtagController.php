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
    			'alum_name' => ALumni::find(request('alumid'))->name,
    			'tags' => request('tag')

    		]);
    	$message = 'Tag has been added succesfully';
    	redirect('/viewdata',compact('message'));
    	
   	}
}
