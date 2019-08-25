<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprouvementPartenariat extends Mailable
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
    public $email;

    public function __construct($nameRespo,$name,$formeJuridique,$email)
    {
        $this->nameRespo=$nameRespo;
        $this->name=$name;
        $this->formeJuridique=$formeJuridique;
        $this->email=$email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.partenaireApproved');
    }
}
