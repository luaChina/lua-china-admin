<?php

namespace App\Repository;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class AdminPermissionRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\AdminPermission $adminPermission)
    {
        $this->model = $adminPermission;
    }

    public function deleteByAdminId(int $id)
    {
        $this->model->where('admin_id', $id)->delete($id);
    }
}