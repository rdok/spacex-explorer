<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
   protected $fillable = ['value'];

   function author() 
   {
      return $this->belongsTo(User::class);
   }

   function thread() 
   {
      return $this->belongsTo(Thread::class);
   }
}
