<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Showcase::where('status', Showcase::STATUS_PUBLISHED)
            ->when($request->get('user_id'), function ($query) use ($request) {
                return $query->where('user_id', $request->get('user_id'));
            })
            ->when($request->get('search'), function ($query) use ($request) {
                return $query->where('title', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('description', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('github_url', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('youtube_url', 'like', '%' . $request->get('search') . '%');
            })
            ->when($request->get('category_id'), function ($query) use ($request) {
                return $query->where('category_id', $request->get('category_id'));
            })
            ->when($request->get('type'), function ($query) use ($request) {
                return $query->where('type', $request->get('type'));
            })
            ->when($request->get('technologies'), function ($query) use ($request) {
                $technologies = strtolower($request->get('technologies'));

                return $query->whereRaw('FIND_IN_SET(?, LOWER(technologiesS))', [$technologies]);
            })
            ->with(['user', 'category', 'media'])
            ->latest()
            // ->paginate();
            ->get();
            
        // $data->withQueryString();

        if (!is_null($this->compact)) {
            $response = $data;
        } else {
            $response = [];
            $_response = [];

            // $response['total'] = $data->total();
            // $response['per_page'] = $data->perPage();
            // $response['current_page'] = $data->currentPage();
            // $response['last_page'] = $data->lastPage();
            // $response['first_page_url'] = $data->url(1);
            // $response['last_page_url'] = $data->url($data->lastPage());
            // $response['next_page_url'] = $data->nextPageUrl();
            // $response['prev_page_url'] = $data->previousPageUrl();
            // $response['path'] = $data->url($data->currentPage());
            // $response['from'] = $data->firstItem();
            // $response['to'] = $data->lastItem();

            // foreach ($data as $item) {
            //     $_response[] = $this->_compact_list($item);
            // }

            $response['data'] = $this->_compact_list($data);
        }

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Showcase $showcase)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        $validator = Validator::make($request->all(), [
            'picture' => ['required', 'max:10960'],
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $fileName = empty($request->title) ? $showcase->title : $request->title;
            $fileDescription = empty($request->description) ? $showcase->description : $request->description;

            $showcase->addMediaFromRequest('picture')
                ->withCustomProperties([
                    'name' => $fileName,
                    'description' => strip_tags($fileDescription)
                ])
                ->toMediaCollection('showcaseImages');

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Berhasil menambahkan foto'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Showcase $showcase)
    {
        $fileId = $request->fileId;
        $item = $showcase->whereHas('media', function ($query) use ($fileId) {
            $query->whereId($fileId);
        });
        if ($item->exists()) {
            $item->first()->deleteMedia($fileId);
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus foto'
            ]);
    }
}
