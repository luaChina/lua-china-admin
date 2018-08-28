<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserRepository $userRepository)
    {
        $userPagination = $userRepository->getPagination(true);
        $users = $userRepository->get(true);
        $lockedUsers = $users->filter(function ($value, $key) {
            return !is_null($value->deleted_at);
        });
        $normalUsers = $users->filter(function ($value, $key) {
            return is_null($value->deleted_at);
        });
        return view('user.index')->with(compact('userPagination', 'normalUsers', 'lockedUsers'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, UserRepository $userRepository)
    {
        $user = $userRepository->find($id);
        if($user->delete()){
            return response()->json(['status' => 0, 'message' => 'success'], 200);
        } else {
            return response()->json(trans('error.user.delete'), 200);
        }
    }

    public function restore(int $id, UserRepository $userRepository)
    {
        $user = $userRepository->find($id, true);
        if($user->restore()){
            return response()->json(['status' => 0, 'message' => 'success'], 200);
        } else {
            return response()->json(trans('error.user.restore'), 200);
        }
    }
}
