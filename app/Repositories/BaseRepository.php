<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:22
 */

namespace App\Repositories;


class BaseRepository
{
    protected $model;

    public function get(bool $withTrashed = false)
    {
        if ($withTrashed) {
            return $this->model->withTrashed()->get();
        }
        return $this->model->get();
    }

    public function getPagination(bool $withTrashed = false)
    {
        if ($withTrashed) {
            return $this->model->withTrashed()->paginate();
        }
        return $this->model->paginate();
    }

    public function create(array $massArr)
    {
        return $this->model->create($massArr);
    }

    public function find(int $id, bool $withTrashed = false)
    {
        if ($withTrashed) {
            return $this->model->withTrashed()->findOrFail($id);
        }
        return $this->model->findOrFail($id);
    }

    public function insert(array $massArr)
    {
        return $this->model->insert($massArr);
    }
}