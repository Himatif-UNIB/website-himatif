<?php

namespace App\Jobs;

use App\Mail\SendCertificate;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\SendingCertificateNotification;

class SendCertificateJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email, $name, $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $name, $order)
    {
        $this->email = $email;
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $certificate_number = str_pad($this->order, 3, '0', STR_PAD_LEFT);

        $pdf = PDF::loadView('certificates.default', [
            'name' => $this->name,
            'certificate_number' => $certificate_number
        ])->setPaper('a4', 'landscape');

        $attachData = $pdf->output();

        Mail::to($this->email)
            ->send(new SendCertificate($this->name, $attachData));
    }
}
