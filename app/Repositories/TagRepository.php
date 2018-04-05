<?php

namespace App\Repository;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class TagRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\Tag $tag)
    {
        $this->model = $tag;
    }

}