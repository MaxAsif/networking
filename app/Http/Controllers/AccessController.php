<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\smember ;
use App\Tagslist;
use App\access;


class AccessController extends Controller
{
    public function index(){
    	$smembers  = smember::get();
    	$tags = Tagslist::get();
    	return view('access',compact('smembers','tags')) ;   }



    public function post(){
    	
    	$access='';

    	 $tags = Tagslist::get();
    	 $smembers  = smember::get();
    	 foreach($tags as $tag)
    	 {
    	 	//echo "hi";
    	 	//echo request($tag['id']);

    	 	if(request($tag['id']) != 0)
    	 		$access=$access . request($tag['id']) . ',';
            

    	 }
    	 if(request('year')!=0)
            $access = $access . request('year'). ',';

    	  foreach($smembers as $sm)
    	 {
    	 	if($sm['name']==request('tag'))
    	 		$id=$sm['id'];
    	 }


     	 access::create([
    		
    		'stud_id' =>$id,
    		'name' => request('tag'),
    		'access' => $access,

    	]);
return view('access',compact('smembers','tags')) ; 

    	}
}
