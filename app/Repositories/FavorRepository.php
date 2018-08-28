<?php

namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class FavorRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\Favor $favor)
    {
        $this->model = $favor;
    }
}