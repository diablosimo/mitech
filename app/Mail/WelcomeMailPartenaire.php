<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMailPartenaire extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
public $nameRespo;
public $name;
public $formeJuridique;

    public function __construct($nameRespo,$name,$formeJuridique)
    {
        $this->nameRespo=$nameRespo;
        $this->name=$name;
        $this->formeJuridique=$formeJuridique;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.welcomePartenaire');
    }
}
