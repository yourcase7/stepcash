<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Advertisement;
use App\Models\AdvertisementHistory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BonusHistoryRepositoryInterface;

class BonusHistoryRepository implements BonusHistoryRepositoryInterface
{
    protected $model, $search;

    public function __construct(AdvertisementHistory $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {}

    public function getAll()
    {}

    public function create(Advertisement $ads, User $user, array $data)
    {
        $data = array_merge($data, ['advertisement_id' => $ads->id]);
        $data = array_merge($data, ['user_id' => $user->id]);
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
