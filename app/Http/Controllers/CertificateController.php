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
        //  return view('private.certificates.index');
    }

    public function create()
    {
         return view('private.certificates.create');
    }

    public function store(Request $request)
    {
        $users = User::take(2)->get();

        foreach ($users as $user) {
            SendCertificateJob::dispatch($user);
        }
    }
}
