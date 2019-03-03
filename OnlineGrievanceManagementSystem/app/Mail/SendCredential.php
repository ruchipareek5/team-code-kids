<?php

namespace App\Mail;

use App\EmailCredetial;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCredential extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $credential;

    public function __construct(EmailCredetial $emailCredetial)
    {
        $this->credential = $emailCredetial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'username'=>$this->credential->username,
            'password'=>$this->credential->password
        ];
        return $this->view('email')->with(['username'=>$this->credential->username,
            'password'=>$this->credential->password]);
    }
}
