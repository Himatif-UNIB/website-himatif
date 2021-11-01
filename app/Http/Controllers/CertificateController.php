<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Jobs\SendCertificateJob;
use App\Notifications\SendingCertificateNotification;
use Illuminate\Support\Facades\Bus;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $batch = null;
        if ($request->batch_id) {
            $batch = Bus::findBatch($request->batch_id);
        }

         return view('private.certificates.index', compact('batch'));
    }

    public function create()
    {
         return view('private.certificates.create');
    }

    public function store(Request $request)
    {
        $users = User::take(5)->get();

        $jobs = [];

        foreach ($users as $user) {
            $jobs[] = new SendCertificateJob($user);
        }

        $batch = Bus::batch($jobs)->dispatch();

        return redirect('/himatif-admin/certificates/?batch_id=' . $batch->id);
    }
}
