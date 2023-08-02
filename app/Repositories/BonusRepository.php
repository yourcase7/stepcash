<?php

namespace App\Repositories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BonusRepositoryInterface;

class BonusRepository implements BonusRepositoryInterface
{
    protected $model, $search;

    public function __construct(Advertisement $model)
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
    {}

    public function delete($id)
    {}

    public function setSearch($keyword)
    {}

    // Your repository methods here...
}
