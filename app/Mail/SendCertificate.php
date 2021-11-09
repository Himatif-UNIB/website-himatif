<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCertificate extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $attachData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $attachData)
    {
        $this->name = $name;
        $this->attachData = $attachData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.certificates.default', ['name' => $this->name])
            ->attachData($this->attachData, 'certificate.pdf');
    }
}
