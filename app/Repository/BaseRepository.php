<?php

namespace App\Repository;

use DB;

interface BaseRepository
{
    public function getById($id);
    public function getAll();
    public static function create(array $data);
    public function delete($id);
    public function edit($id);
}
