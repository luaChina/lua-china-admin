<?php

namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class AdminRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\Admin $admin)
    {
        $this->model = $admin;
    }

    public function findWithPermissions(int $id)
    {
        return $this->model->with('adminPermissions')->find($id);
    }
}