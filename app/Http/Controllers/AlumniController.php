<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Tagslist;
use App\User;
use Auth;
use App\access;
use App\smember;

session_start();
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
            'year' => 'required',
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
            'year' => request('year'),
          'notes' =>" "
    	]);
        $message = 'Alumni has been added to databse succesfully!';
        return view('addalumni',compact('message'));
    }
    public function get()
    {
        $alumni = Alumni::get();
        $message = '';
        $tags = Tagslist::get();
        
    
        return view('viewdata',compact('message','tags','alumni'));
    }
     public function getyear($year)
    {
        $alumni = Alumni::where('year',$year)->get();
        $message = '';
        $tags = Tagslist::get();
         

    
        return view('viewdata',compact('message','tags','alumni'));
    }
    public function editt()
    {
        $alumni = Alumni::where('id',request('submit'))->get();
        $message = '';
        $tags = Tagslist::get();

    
        return view('editdata',compact('alumni','message','tags'));
    }
    public function profile($id)
    {

        $alumni = Alumni::where('id',$id)->get();
        
      
        return view('profile',compact('alumni'));
    }
    public function editdata()
    {
 
/*
 $alum=Alumni::find(request('id'));
  $alum->delete();      


        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            
            'dob' => 'required',
            'industry' => 'required',
            'year' => 'required',
        ]);*/
        $tags = Tagslist::get();
        Alumni::where('id', request('id'))
        ->update([
            'id'=>request('id'),
            'name' => request('name'),
            'email' => request('email'),
            'address' => request('address'),
            'city' => request('city'),
            'country' => request('country'),
            'mobile' => request('mobile'),
            
            'dob' => request('dob'),
            'industry' => request('industry'),
            'year' => request('year'),
        ]);
         $alumni = Alumni::get();
        $message = '';
        if(Auth::user()->type == 'CO' )
          return redirect('/viewdata');
          else
            return redirect('/viewdata_s');
        
    }



    public function get_s()
   {
       $user_name = Auth::user()->name;
       
       $student_id = smember::where('name',$user_name)->first()->id;
       //dd($student_id);
       $arr = access::where('stud_id',$student_id)->pluck('access');
       //dd($acessess);

       $accesses = [];
       foreach ($arr as $access)
       {
           array_push($accesses,explode(',',$access));            
       }
       //dd($arr);

       $tags_list = [];
       foreach ($accesses as $access )
       {
            array_pop($access);
            $tags = [];

            foreach($access as $a )
            {

               if($tag = Tagslist::find($a))
               {
                 $tag = Tagslist::find($a)->tagname;
                 array_push($tags, $tag);
               }
               else
                {
                    $tags = [];
                   break;
               }
               
             }
              array_push($tags_list, $tags);

       }
     
       return view('viewdata_s',compact('tags_list'));
   }
   public function editnotes($id)
   {
            Alumni::where('id', $id)
        ->update([
            
            'notes' => request('comment'),
        ]);
         $alumni = Alumni::where('id',$id)->get();
        $message = '';
        $tags = Tagslist::get();

    
        return redirect('/profile/'.$id);
   }
}
  