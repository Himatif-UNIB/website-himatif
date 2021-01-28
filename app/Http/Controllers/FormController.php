<?php

namespace App\Http\Controllers;

use App\Exports\ExportFormAnswers;
use App\Models\Form;
use App\Models\Form_answer;
use App\Models\Form_question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Shivella\Bitly\Facade\Bitly;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::orderBy('created_at', 'DESC')->paginate();

        return view('forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('form')) {
            $form_id = $request->get('form');
            $form = Form::findOrFail($form_id);

            if ($request->session()->has('success')) {
                return view('forms.edit', compact('form'))
                    ->with(['displayIdentity' => false]);
            } else {
                return redirect()
                    ->route('forms.edit', $form_id);
            }
        } else {
            return view('forms.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:forms,title|min:4|max:255',
            'description' => 'nullable|min:10|max:512',
            'post_message' => 'nullable|min:10|max:2048',
            'picture' => 'nullable|max:5096|mimes:jpg,png,jpeg,svg,gif'
        ]);

        $form = new Form;
        $form->creator_id = request()->user()->id;
        $form->title = $request->title;
        $form->slug = Str::slug($request->title);
        $form->description = $request->description;
        $form->post_message = $request->post_message;
        $form->max_fill_date = $request->max_fill_date;
        $form->max_fill_answer = $request->max_fill_answer;
        $form->save();

        //$form->bitly_link = Bitly::getUrl(route('form.show', ['form' => $form->id, 'slug' => $form->slug]));
        //$form->save();

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $form->addMediaFromRequest('picture')
                ->toMediaCollection('formPicture');
        }

        return redirect()
            ->route('forms.create', ['form' => $form->id])
            ->withSuccess($form->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //$isExpire =
        return view('forms.show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        return view('forms.edit', compact('form'))
            ->with(['displayIdentity' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        $action = $request->action;

        switch ($action) {
            case 'close_form':
                $form->status = 3;
                $form->closed_at = Carbon::now()->toDateTimeString();
                $form->save();

                return redirect()
                    ->back()
                    ->withSuccess('Formulir berhasil ditutup');
                break;
            case 'open_form':
                $form->status = 2;
                $form->closed_at = NULL;
                $form->save();

                return redirect()
                    ->back()
                    ->withSuccess('Formulir berhasil dibuka kembali.');
                break;
            case 'edit_form':
                $form->description = $request->description;
                $form->post_message = $request->post_message;
                $form->status = ($request->save_as_draft == NULL) ? 2 : 1;
                $form->publish_at = ($request->save_as_draft == NULL) ? Carbon::now() : NULL;
                $form->save();

                if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                    if (isset($form->media[0])) {
                        $form->media[0]->delete();
                    }

                    $form->addMediaFromRequest('picture')
                        ->toMediaCollection('formPicture');
                }

                if (count($form->questions) > 0) {
                    $form->questions()->where('form_id', $form->id)->delete();
                }

                foreach ($request->question as $key => $question) {
                    $formQuestion = new Form_question;
                    $formQuestion->form_id = $form->id;
                    $formQuestion->question = $question['title'];
                    $formQuestion->type = $question['type'];
                    $formQuestion->is_required = isset($question['is_required']) ? true : false;
                    if ($question['type'] >= 3 && $question['type'] <= 5) {
                        $formQuestion->multiple_options = json_encode($question['multiple_options']);
                    }

                    if ($question['type'] == 9) {
                        $fileRules = [
                            'mimes' => explode(',', $question['file_mimes']),
                            'maxSize' => $question['file_max_size']
                        ];

                        $formQuestion->file_rules = json_encode($fileRules);
                    }

                    $formQuestion->save();
                }

                return redirect()
                    ->route('forms.show', $form->id)
                    ->withSuccess(($request->save_as_draft == NULL) ? 'Berhasil membuat formulir' : 'Draft berhasil disimpan');
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        if (count($form->questions) > 0) {
            $form->questions()->where('form_id', $form->id)->delete();
        }
        if (count($form->answers) > 0) {
            $form->answers()->where('form_id', $form->id)->delete();
        }

        if (isset($form->media[0])) {
            $form->media[0]->delete();
        }

        $form->delete();

        return redirect()
            ->route('forms.index')
            ->withSuccess('Berhasil menghapus formulir');
    }

    public function answers(Form $form)
    {
        return view('forms.answers', compact('form'));
    }

    public function exportAnswer(Form $form)
    {
        return Excel::download(new ExportFormAnswers($form->questions, $form->answers), 'Jawaban Formulir ' . $form->title . '.xlsx');
    }
}
