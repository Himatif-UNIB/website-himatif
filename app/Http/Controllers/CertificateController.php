<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Jobs\SendCertificateJob;
use App\Models\Certificate;
use App\Models\CertificateUser;
use App\Models\Form;
use App\Models\Form_question;
use App\Models\Form_question_answer;
use App\Models\JobBatch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

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

    protected function getFormQuestionAnswer($data)
    {
         return Form_question_answer::where('question_id', $data)->get('answer');
    }

    public function store(Request $request)
    {
        $names = $this->getFormQuestionAnswer($request->name);
        $emails = $this->getFormQuestionAnswer($request->email);

        DB::transaction(function () use ($names, $emails, $request) {
            foreach ($names as $name) {
                CertificateUser::create([
                    'uuid' => uniqid(),
                    'certificate_id' => $request->certificate_id,
                    'user_name' => $name->answer
                ]);
            }

            $jobs = [];
            $i = 0;

            foreach ($emails as $email) {
                $jobs[] = new SendCertificateJob($email->answer, $names[$i]->answer);
                $i++;
            }

            $batch = Bus::batch($jobs)->name($request->job_name)->dispatch();

            return redirect('/himatif-admin/certificates/?batch_id=' . $batch->id);
        });
    }
}
