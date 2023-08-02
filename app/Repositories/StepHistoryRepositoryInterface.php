<?php

namespace App\Repositories;

use App\Models\User;

interface StepHistoryRepositoryInterface
{
    public function getById($id);

    public function getAll();

    public function getByUserId($user_id);

    public function getInToday($user_id);

    public function create(User $user, array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function setSearch($keyword);

    // Add your interface methods here...
}
