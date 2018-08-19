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

    public function get()
    {
        return $this->model->get();
    }

    public function getPagination(bool $withTrashed = false)
    {
        if ($withTrashed) {
            return $this->model->withTrashed()->paginate();
        } else {
            return $this->model->paginate();
        }
    }

    public function create(array $massArr)
    {
        return $this->model->create($massArr);
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }
}