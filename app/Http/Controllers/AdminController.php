<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AddAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Repositories\AdminPermissionRepository;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ViewErrorBag;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AdminRepository $adminRepository)
    {
        return view('admin.index')->with(['admins' => $adminRepository->getPagination(true)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.create')->with(['permissions' => config('permission')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAdminRequest $request, AdminRepository $adminRepository)
    {
        DB::beginTransaction();
        try {
            $admin = $adminRepository->create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => bcrypt($request->get('password')),
            ]);
            foreach ($request->get('permissions') as $permissionId) {
                $adminPermissions[] = [
                    'admin_id'      => $admin->id,
                    'permission_id' => $permissionId
                ];
            }
            if (isset($adminPermissions)) {
                $admin->adminPermissions()->insert($adminPermissions);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            if (config('app.env') !== 'production') {
                dd($e);
            }
            Log::error($e->getMessage());
            return back()->withInput()->withErrors(['system' => '系统错误']);
        }

        return redirect('/admins');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id, AdminRepository $adminRepository)
    {
        $admin = $adminRepository->findWithPermissions($id);
        return view('admin.edit')->with(['admin' => $admin, 'permissions' => config('permission')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminRequest $request, int $id, AdminRepository $adminRepository, AdminPermissionRepository $adminPermissionRepository)
    {
        DB::beginTransaction();
        try {
            $admin = $adminRepository->find($id);
            if ($request->has('password') && !is_null($request->get('password'))) {
                $admin->update([
                    'name'     => $request->get('name'),
                    'email'    => $request->get('email'),
                    'password' => bcrypt($request->get('password')),
                ]);
            } else {
                $admin->update([
                    'name'  => $request->get('name'),
                    'email' => $request->get('email'),
                ]);
            }
            $adminPermissionRepository->deleteByAdminId($admin->id);
            $adminPermissions = [];
            foreach ($request->get('permissions') as $permissionId) {
                $adminPermissions[] = [
                    'admin_id'      => $admin->id,
                    'permission_id' => $permissionId
                ];
            }
            $adminPermissionRepository->insert($adminPermissions);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            if (config('app.env') !== 'production') {
                dd($e);
            }
            Log::error($e->getMessage());
            return back()->withInput()->withErrors(['system' => '系统错误']);
        }
        return redirect('/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, AdminRepository $adminRepository)
    {
        $admin = $adminRepository->find($id);
        $admin->delete();
        return response()->json(['status' => 0, 'message' => 'success'], 200);
    }

    public function restore(int $id, AdminRepository $adminRepository)
    {
        $admin = $adminRepository->find($id, true);
        if($admin->restore()){
            return response()->json(['status' => 0, 'message' => 'success'], 200);
        } else {
            return response()->json(trans('error.admin.restore'), 200);
        }
    }
}
