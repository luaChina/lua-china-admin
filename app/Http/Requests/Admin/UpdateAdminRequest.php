<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAdminRequest extends FormRequest
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
            'name' => 'required|string|max:200|min:2',
            'email' => 'required|email',
            'permissions' => 'nullable|array',
            'password' => 'nullable|string|max:50|min:6|confirmed'
        ];
    }
}
