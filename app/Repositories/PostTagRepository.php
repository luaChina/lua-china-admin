<?php

namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class PostTagRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\PostTag $postTag)
    {
        $this->model = $postTag;
    }

}