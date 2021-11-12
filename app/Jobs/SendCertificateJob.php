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

    private $email, $name, $order, $certificate_image, $certificate_number;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $name, $order, $certificate_image, $certificate_number)
    {
        $this->email = $email;
        $this->name = $name;
        $this->order = $order;
        $this->certificate_image = $certificate_image;
        $this->certificate_number = $certificate_number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $certificate_number = str_pad($this->order, 3, '0', STR_PAD_LEFT) . '/' . $this->certificate_number;

        $pdf = PDF::loadView('certificates.default', [
            'name' => $this->name,
            'certificate_image' => $this->certificate_image,
            'certificate_number' => $certificate_number,
        ])->setPaper('a4', 'landscape');

        $attachData = $pdf->output();

        Mail::to($this->email)
            ->send(new SendCertificate($this->name, $attachData));
    }
}
