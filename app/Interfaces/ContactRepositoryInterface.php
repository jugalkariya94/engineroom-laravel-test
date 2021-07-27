<?php

namespace App\Interfaces;

interface ContactRepositoryInterface
{
    public function all($userID);

    public function get($id, $userID);

    public function save($request, $id = null);

    public function delete($id, $userID);


}
