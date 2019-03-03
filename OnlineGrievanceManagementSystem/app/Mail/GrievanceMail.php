<?php

namespace App\Mail;

use App\Grievance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GrievanceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public $description;
    public function __construct( $id,$description)
    {
        $this->id = $id;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('grievance')->with(['id'=>$this->id,
            'password'=>$this->description]);
    }
}
