<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getById($id);

    public function getByGoogleId($google_id);

    public function getAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function setSearch($keyword);

    // Add your interface methods here...
}
