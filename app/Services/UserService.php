<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function collection($inputs = null)
    {
        $users = $this->model;

        if (!empty($inputs['filters'])) {
            $users->filter($inputs['filters']);
        }

        if (!empty($inputs['sort'])) {
            $users = $users->orderBy($inputs['sort']['by'], $inputs['sort']['order'])->paginate(config('site.pagiante.limit'));
        } else {
            $users = $users->orderBy('id', 'desc')->paginate(config('site.pagiante.limit'));
        }

        return $users;
    }
}
