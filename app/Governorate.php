<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governerates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function city()
    {
        return $this->hasMany('App\City','governerate_id');
    }

}