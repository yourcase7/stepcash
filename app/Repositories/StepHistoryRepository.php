<?php

namespace App\Repositories;

use App\Models\StepHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\StepHistoryRepositoryInterface;

class StepHistoryRepository implements StepHistoryRepositoryInterface
{
    protected $model, $search;

    public function __construct(StepHistory $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {}

    public function getAll()
    {}

    public function create(User $user, array $data)
    {
        $data = array_merge($data, ['user_id' => $user->id]);

        $this->model->create($data);
    }

    public function update(array $data, $id)
    {}

    public function delete($id)
    {}

    public function setSearch($keyword)
    {}

    // Your repository methods here...
}
