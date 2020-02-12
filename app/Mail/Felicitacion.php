<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Felicitacion extends Mailable
{
    use Queueable, SerializesModels;

     public $felicitacion;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($felicitacion)
    {
        $this->felicitacion = $felicitacion;
    }


    public function build()
    {
        
        return $this->from('teo.mate.usac@gmail.com')
                    ->view('mails.felicitacion')
                    ->text('mails.felicitacion_plain');
    }
}

