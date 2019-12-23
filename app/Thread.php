<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
   protected $fillable = ['title', 'body'];

   function author() 
   {
      return $this->belongsTo(User::class);
   }

   function replies() 
   {
      return $this->hasMany(Reply::class);
   }
}
