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

    function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function url($path = null)
    {
        $url = url('threads');

        if ($this->channel) {
            $url .= '/' . $this->channel->slug;
        }

        $url .= '/' . $this->id;

        return $path ? "$url/$path" : $url;
    }
}
