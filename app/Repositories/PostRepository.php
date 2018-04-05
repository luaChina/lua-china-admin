<?php

namespace App\Repository;
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

    public function getPagination($withTrashed = false)
    {
        return $this->model->with('tag', 'user')->paginate();
    }
}