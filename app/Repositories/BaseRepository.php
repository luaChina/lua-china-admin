<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:22
 */

namespace App\Repository;


class BaseRepository
{
    protected $model;

    public function getPagination($withTrashed = false)
    {
        if ($withTrashed) {
            return $this->model->paginate();
        }
    }
}