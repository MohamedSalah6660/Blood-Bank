<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Client;
class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    
  public $client;

    public function __construct(Client $client)
    {

        $this->client = $client;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.sendView');
    }
}
