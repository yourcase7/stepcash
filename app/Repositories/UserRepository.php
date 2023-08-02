<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $model, $search;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {}

    public function getByGoogleId($google_id)
    {
        return $this->model->where('google_id', $google_id)->first();
    }

    public function getAll()
    {}

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {}

    public function delete($id)
    {}

    public function setSearch($keyword)
    {}

    // Your repository methods here...
}
