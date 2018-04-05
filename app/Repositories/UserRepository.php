<?php

namespace App\Repository;
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 05/04/2018
 * Time: 18:17
 */
class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(\App\Models\User $user)
    {
        $this->model = $user;
    }
}