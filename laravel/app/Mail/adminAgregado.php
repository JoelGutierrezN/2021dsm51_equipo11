<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class adminAgregado extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Asignacion de Administrador | SafetyDogs";
    public $user;
    public $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, User $admin)
    {
        $this->user = $user;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.admin-agregado');
    }
}
