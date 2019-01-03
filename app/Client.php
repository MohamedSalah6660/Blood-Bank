<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ClientResetPasswordNotification;
class Client extends Authenticatable 
{    use Notifiable;


    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'birth_date', 'phone', 'password', 'blood_type', 'donation_last_date', 'city_id', 'api_token' , 'pin_code', 'verifyToken');

    public function contact()
    {
        return $this->hasMany('App\Contact');
    }

    public function report()
    {
        return $this->hasMany('App\Report');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function types()
    {
        return $this->belongsToMany('App\BloodType');
    }
       public function cities()
    {
        return $this->belongsToMany('App\City');
    }


    public function favourites()
    {
        return $this->belongsToMany('App\Post' , 'client_post');
    }

   public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));    
    }
        public function tokens()
    {
        return $this->hasMany('App\Token');
    }


        protected $hidden = [
        'password', 'api_token',
    ];

}