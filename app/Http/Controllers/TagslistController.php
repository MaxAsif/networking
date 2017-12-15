<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagslist;
use App\Addtag;

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
        strtoupper(request('name'));
       // dd(Tagslist::where('tagname',request('name'))->get()->toArray());
        if(Tagslist::where('tagname',request('name'))->get()->toArray() == null){
            Tagslist::create([
                'tagname' => request('name'),
            ]);

            return redirect('/addtag')->with('message','Tag was created succesfully!');
        }
        else
        {
          return redirect('/addtag')->with('Error','Tag already exists');
        }
    }
    public function deletedata()
    {  
        //dd(request('tag'));
        
        Tagslist::destroy(request('tag')); 
        $alumni = Tagslist::get();

        return redirect('/addtag')->with('message','Tag was deleted succesfully!');
    }
}



