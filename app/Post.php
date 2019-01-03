<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'thumbnail', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

        public function favoritepage()
    {
        return $this->belongsToMany('App\Client' , 'client_post');
    }

}