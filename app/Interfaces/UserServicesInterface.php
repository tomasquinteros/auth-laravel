<?php

namespace App\Interfaces;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

interface UserServicesInterface
{
    public function getAll();
    public function getById(string $id);
    public function delete(string $id);
    public function create(UserRequest $data);
    public function update($id, Request $data);
}
