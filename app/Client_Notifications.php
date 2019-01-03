<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_Notifications extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('client_id', 'notification_id');

}