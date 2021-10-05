<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Form_answer;
use App\Models\Form_question_answer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Menampilkan formulir
     *
     * Menampilkan formulir dari database berdasarkan
     * Id yang dipilih
     *
     * @param   Form    $form   Instance form yang akan diakses
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  View\Factory@public.forms.show
     */
    public function show(Form $form)
    {
        //status = 1 (konsep), jangan boleh diakses
        if ($form->status == 1) {
            abort(404, 'Sepertinya formulir itu tidak ada...');
        }

        //status = 3 (ditutup admin), jangan boleh diakses
        if ($form->status == 3) {
            abort(410, 'Sayangnya, formulir tersebut sudah ditutup');
        }

        // jika user sudah pernah menjawab
        if ($form->userAlreadyAnswered()->exists() && !request()->session()->has('success')) {
            abort(410, 'Anda sudah menjawab form ini');
        }

        if ($form->closed_at != NULL && $form->closed_at < Carbon::now()) {
            abort(410, 'Sayangnya, formulir tersebut sudah ditutup');
        }

        if (($form->max_fill_date != NULL && $form->max_fill_date < Carbon::now()) || ($form->max_fill_answer != NULL && count($form->answers) >= $form->max_fill_answer)) {
            abort(410, 'Formulir ini sudah tidak menerima jawaban.');
        }

        $dateFields = $form->questions()->where('type', 6)->get();
        $timeFields = $form->questions()->where('type', 7)->get();
        $dateTimeFields = $form->questions()->where('type', 8)->get();

        return view('public.forms.show', compact('dateFields', 'dateTimeFields', 'form', 'timeFields'));
    }

    /**
     * Simpan jawaban form
     *
     * Menyimpan jawaban form yang diisikan oleh user
     *
     * @param   Request $request    HTTP Request data
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  redirectBack
     */
    public function store(Request $request)
    {
        $form_id = $request->form_id;
        $form = Form::findOrFail($form_id);
        $validateFields = [];
        $fileFields = [];

        foreach ($form->questions as $field) {
            if ($field->is_required == 1 && $field->type != 9) {
                $validateFields['question.'. $field->id] = 'required';
            }

            if ($field->type == 9) {
                $fileFields[] = $field->id;
            }
        }

        $request->validate($validateFields);

        $answer = new Form_answer;
        $answer->form_id = $form_id;
        $answer->ip_address = $request->getClientIp();
        $answer->is_over_date = ($form->max_fill_date != NULL && (Carbon::parse($form->max_fill_date) < Carbon::now()));
        $answer->is_over_answer = ($form->max_fill_answer != NULL && (count($form->answers) >= $form->max_fill_answer));
        $answer->user_agent = $request->userAgent();
        $answer->save();

        foreach ($form->questions as $question) {
            $form_question_answer = new Form_question_answer;
            $form_question_answer->answer_id = $answer->id;
            $form_question_answer->question_id = $question->id;
            $form_question_answer->answer = isset($request->question[$question->id]) ? $request->question[$question->id] : NULL;

            $form_question_answer->save();

            if ($request->hasFile('question.'. $question->id) && $request->file('question.'. $question->id)->isValid()) {
                $form_question_answer->addMediaFromRequest('question.'. $question->id)
                    ->toMediaCollection('formUploadFile');
            }
        }

        if ($form->is_over_date) {
            //tampilkan peringatan jika user mengisi formulir melewati
            //batas waktu yang sudah ditentukan. Namun, data tetap disimpan

            abort(410, 'Formulir ini sudah melewati batas waktu maksimal pengisian.');
        }

        return redirect()
            ->back()
            ->withSuccess(($form->post_message == NULL) ? FALSE : $form->post_message);
    }
}
