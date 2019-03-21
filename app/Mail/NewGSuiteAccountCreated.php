<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewGSuiteAccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $password;

    public $email_handle;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_handle, $password)
    {
        $this->email_handle = $email_handle;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.services.gsuite.added');
    }
}
