<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $fromName;
    public $fromEmail;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $fromEmail, $fromName)
    {
        //
        $this->subject = $subject;
        $this->content = $content;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromEmail)->subject($this->subject)->view('mail.contact');
    }
}
