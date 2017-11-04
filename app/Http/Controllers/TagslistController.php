<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagslist;

class TagslistController extends Controller
{
    //

    public function index()
    {

    	$alumni = Tagslist::get();
    	return view('addtag',compact('alumni'));
    }


     public function postdata()
    {

    	
        $this->validate(request(),[
            'name' => 'required',
            
        ]);
    	Tagslist::create([
    		'tagname' => request('name'),
    	]);
        
        $alumni = Tagslist::get();
        return view('addtag',compact('alumni'));
    }
     public function deletedata()
    {

        
       
       Tagslist::destroy(request('tag'));
        
        $alumni = Tagslist::get();
        return view('addtag',compact('alumni'));
    }
}



