<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog_comment;
use App\Models\Blog_post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Blog_comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog_comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_comment $comment)
    {
        $action = $request->action;
        switch ($action) {
            case 'approve' :
                $comment->status = 'approved';
                $comment->save();

                $response = 'Berhasil menerima komentar';
            break;
            case 'decline' :
                $comment->status = 'declined';
                $comment->save();

                $response = 'Berhasil menolak komentar';
            break;
        }

        return response()
            ->json([
                'success' => true,
                'message' => $response
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog_comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_comment $comment)
    {
        $postId = $comment->post_id;
        $comment->replies()->delete();
        $comment->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus komentar',
                'commentCount' => Blog_comment::where('post_id', $postId)->count()
            ]);
    }
}
