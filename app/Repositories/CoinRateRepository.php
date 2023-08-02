<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\CoinRate;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\CoinRateRepositoryInterface;

class CoinRateRepository implements CoinRateRepositoryInterface
{
    protected $model, $search;

    public function __construct(CoinRate $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getAll()
    {}

    public function create(object $object, array $data)
    {}

    public function addCoin($id, $coin)
    {
        $user = $this->getById($id);
        return $user->update([
            'coin' => $user->coin + $coin
        ]);
    }

    public function cutCoin($id, $coin)
    {
        $user = $this->getById($id);
        return $user->update([
            'coin' => $user->coin - $coin
        ]);
    }

    public function update(array $data, $id)
    {}

    public function delete($id)
    {}

    public function setSearch($keyword)
    {}

    // Your repository methods here...
}
