<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('title', 'message', 'client_id');
    
    public function client()
    {
        return $this->belongsTo('App\Client');
    }


}