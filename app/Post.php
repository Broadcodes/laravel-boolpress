<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'slug'];

    public function categories(){
        return $this->belongsTo('App\Category');
    }
}
