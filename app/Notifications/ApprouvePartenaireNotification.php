<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApprouvePartenaireNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
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
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->success()
            ->subject('Approuvement d\'adhèsion MITech')
            ->greeting('Cher(e) '.$this->nameRespo.',  responsable de: '.$this->name.'('.$this->formeJuridique.')')
            ->line('Nous sommes heureux de vous informer que votre demande de partenariat a été approuvée.')
            ->line('Vous pouvez se connecter dans notre site en utilisant votre adresse e-mail: '.$this->email)
            ->salutation('Merci pour votre attente.')
            ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
