<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Jobs\SendCertificateJob;
use App\Models\Certificate;
use App\Models\Form;
use App\Models\JobBatch;
use Illuminate\Support\Facades\Bus;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $batch = null;
        if ($request->batch_id) {
            $batch = Bus::findBatch($request->batch_id);
        }

        $batches = JobBatch::latest()->get();

        return view('private.certificates.index', compact('batch', 'batches'));
    }

    public function send()
    {
        $certificates = Certificate::latest()->get();
        $forms = Form::with('questions')->latest()->get();

        return view('private.certificates.send', compact('certificates', 'forms'));
    }

    public function create()
    {
        return view('private.certificates.create');
    }

    public function store(Request $request)
    {
        $users = User::take(2)->get();

        $jobs = [];

        foreach ($users as $user) {
            $jobs[] = new SendCertificateJob($user);
        }

        $batch = Bus::batch($jobs)->name($request->job_name)->dispatch();

        return redirect('/himatif-admin/certificates/?batch_id=' . $batch->id);
    }
}
