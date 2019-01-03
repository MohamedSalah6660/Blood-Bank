<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

        public function donation()
    {
        return $this->hasMany('App\Donation');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

}