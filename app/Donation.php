<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model 
{

    protected $table = 'donations';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'blood_type_id', 'blood_bags', 'hospital_name', 'hospital_address', 'phone', 'notes', 'city_id');

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function bloodtype()
    {
        return $this->belongsTo('App\BloodType', 'blood_type_id');
    }

    public function city()
    {
     return $this->belongsTo('App\City');
   
    }
}