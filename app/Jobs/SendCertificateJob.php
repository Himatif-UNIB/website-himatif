<?php

namespace App\Jobs;

use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\SendCertificate;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\SendingCertificateNotification;
use Illuminate\Bus\Batchable;

class SendCertificateJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email, $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pdf = PDF::loadView('certificates.default')->setPaper('a4', 'landscape');
        $attachData = $pdf->output();

        Mail::to($this->email)
            ->send(new SendCertificate($this->name, $attachData));
    }
}
