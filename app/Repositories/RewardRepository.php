<?php

namespace App\Repositories;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\RewardRepositoryInterface;

class RewardRepository implements RewardRepositoryInterface
{
    protected $model, $search;

    public function __construct(Reward $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create(object $object, array $data)
    {}

    public function update(array $data, $id)
    {
        $reward = $this->getById($id);
        return $reward->update($data);
    }

    public function delete($id)
    {}

    public function setSearch($keyword)
    {}

    // Your repository methods here...
}
