<?php

namespace App\Http\Requests\Admin;

use App\Repositories\AdminPermissionRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        foreach (Auth::user()->adminPermissions as $adminPermission) {
            if ($adminPermission->permission_id === config('permission.userManage')['id']) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:admins,name',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|string|min:6|max:50',
            'permissions' => 'nullable|array'
        ];
    }
}
