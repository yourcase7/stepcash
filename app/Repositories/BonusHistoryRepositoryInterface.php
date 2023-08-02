<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Advertisement;

interface BonusHistoryRepositoryInterface
{
    public function getById($id);

    public function getAll();

    public function getByUserId($id);

    public function create(Advertisement $ads, User $user, array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function setSearch($keyword);

    // Add your interface methods here...
}
