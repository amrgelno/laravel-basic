<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPosts extends Model
{
    use HasFactory;

     protected $table = 'adminposts';

     protected $fillable = ['AdminPosts','admin_id'];

     public $timestamps=true;   // default  true or false

// active method   by  the Way 

public function Admin()
{
    return  $this->belongsTo('App\Models\Admin',"foreignkey",'admin_id');   // userid is foreign 
}




}
