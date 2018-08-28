<?php

namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class PostRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\Post $post)
    {
        $this->model = $post;
    }

    public function getPagination(bool $withTrashed = false)
    {
        if ($withTrashed) {
            return $this->model->with('postTag', 'user')->withTrashed()->paginate();
        }
        return $this->model->with('postTag', 'user')->paginate();
    }
}