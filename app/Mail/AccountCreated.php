<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Auth\User;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@usaf.cloud')
            ->markdown('emails.users.accounts.created')
            ->with(['loginUrl' => $this->buildUrl()]);
    }

    protected function buildUrl()
    {
        return URL::temporarySignedRoute(
            'login.invitation',
            now()->addDays(2),
            ['user' => $this->user]
        );
    }
}
