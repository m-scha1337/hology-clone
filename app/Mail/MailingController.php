<?php

namespace App\Mail;

use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailingController extends Mailable
{
    use Queueable, SerializesModels;
    public $gusers;
    public $gtoken;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(Users $users, $token)
    {
        $this->gtoken=$token;
        $this->gusers=$users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@hology.events')->subject("Deine Registrierung bei Hology "."\u{1F973}")->markdown('emails.markdownverify', ['user'=>$this->gusers, 'token'=>route('verify', $this->gtoken)]);
    }
}
