<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\StepHistory;
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
    {
        return $this->model->find($id);
    }

    public function getByUserId($user_id)
    {
        return $this->model->where('user_id', $user_id)->first();
    }

    public function getInToday($user_id)
    {
        return $this->model->where('user_id', $user_id)->whereDate('created_at', Carbon::today())->first();
    }

    public function getAllTodayNotConvert()
    {
        return $this->model->where('is_convert', 0)->whereDate('created_at', Carbon::today())->get();
    }

    public function getAll()
    {}

    public function create(User $user, array $data)
    {
        $data = array_merge($data, ['user_id' => $user->id]);

        $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $step = $this->getById($id);

        return $step->update($data);
    }

    public function delete($id)
    {}

    public function setSearch($keyword)
    {}

    // Your repository methods here...
}
