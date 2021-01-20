<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Form_answer;
use App\Models\Form_question_answer;
use Illuminate\Http\Request;

class UserFormController extends Controller
{
    public function show(Form $form)
    {
        if ($form->status == 1) {
            abort(404, 'Sepertinya formulir itu tidak ada...');
        }
        if ($form->status == 3) {
            abort(410, 'Sayangnya, formulir tersebut sudah ditutup');
        }

        $dateFields = $form->questions()->where('type', 6)->get();
        $timeFields = $form->questions()->where('type', 7)->get();
        $dateTimeFields = $form->questions()->where('type', 8)->get();

        return view('public.forms.show', compact('dateFields', 'dateTimeFields', 'form', 'timeFields'));
    }

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

        return redirect()
            ->back()
            ->withSuccess(($form->post_message == NULL) ? FALSE : $form->post_message);
    }
}
