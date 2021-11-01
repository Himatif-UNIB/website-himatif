<?php

namespace App\Http\Controllers;

use App\Jobs\SendCertificateJob;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SendingCertificateNotification;

class CertificateController extends Controller
{
    public function index()
    {
         return view('private.certificates.index');
    }

    public function store()
    {
        $users = User::take(5)->get();

        foreach ($users as $user) {
            SendCertificateJob::dispatch($user);
            // $user->notify(new SendingCertificateNotification());
        }

        // PDF::loadView('pdf.invoice');
    }
}
