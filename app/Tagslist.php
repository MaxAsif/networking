<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Tagslist extends Model
{
	public $table = "tagslist";
     protected $fillable = [
        'id', 'tagname',
    ];
}
?>
