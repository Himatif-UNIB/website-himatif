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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_certificate'])->only(['create', 'store']);
        $this->middleware(['permission:update_certificate'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_certificate'])->only(['destroy']);
        $this->middleware(['permission:read_certificate'])->only(['index', 'getFormQuestionAnswer']);
        $this->middleware(['permission:send_certificate'])->only(['send', 'retryBatch']);
    }

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

    public function retryBatch($batch_id)
    {
        // After calling retry-batch, the queue:work command will do it again
        Artisan::call("queue:retry-batch {$batch_id}");

        return redirect('/himatif-admin/certificates/?batch_id=' . $batch_id);
    }

    protected function getFormQuestionAnswer($data)
    {
         return Form_question_answer::where('question_id', $data)->get('answer');
    }

    public function store(Request $request)
    {
        $names = $this->getFormQuestionAnswer($request->name);
        $emails = $this->getFormQuestionAnswer($request->email);

        $jobs = [];
        $i = 0;

        foreach ($emails as $email) {
            $certificate_user = CertificateUser::create([
                'certificate_id' => $request->certificate_id,
                'order' => $i + 1,
                'user_name' => $names[$i]->answer
            ]);

            $certificate = Certificate::find($request->certificate_id);

            $jobs[] = new SendCertificateJob($email->answer, $names[$i]->answer,
            $certificate_user->order, $certificate->background_image, $certificate->number
            );
            $i++;
        }

        $batch = Bus::batch($jobs)->name($request->job_name)->dispatch();

        return redirect('/himatif-admin/certificates/?batch_id=' . $batch->id);
    }

    public function destroy($batch_id)
    {
        JobBatch::find($batch_id)->delete();

        return redirect()->back()->withSuccess('Berhasil menghapus job batch');
    }
}
