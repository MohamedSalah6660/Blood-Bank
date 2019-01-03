<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('governerate_id', 'name');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function client()
    {
        return $this->hasMany('App\Client');
    }

    public function donation_request()
    {
        return $this->hasMany('App\Donation');

    }

     public function governorate(){

       return $this->belongsTo('App\Governorate', 'governerate_id');

    } 


} 