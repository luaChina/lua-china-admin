<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PostRepository $postRepository)
    {
        return view('post.index')->with(['posts' => $postRepository->getPagination(true)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, PostRepository $postRepository)
    {
        $post = $postRepository->find($id);
        if($post->delete()){
            return response()->json(['status' => 0, 'message' => 'success'], 200);
        } else {
            return response()->json(trans('error.post.delete'), 200);
        }
    }

    public function restore(int $id, PostRepository $postRepository)
    {
        $post = $postRepository->find($id, true);
        if($post->restore()){
            return response()->json(['status' => 0, 'message' => 'success'], 200);
        } else {
            return response()->json(trans('error.post.restore'), 200);
        }
    }
}
