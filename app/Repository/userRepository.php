<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;

class userRepository implements BaseRepository
{
    public function getBySlug($slug)
    {
    }

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getById($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return DB::table('users')
            ->get();
    }

    public static function create($user)
    {
        DB::table('users')->insert(
            [
                'full_name' => $user['fullName'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]
        );
    }

    public function delete($id)
    {
        DB::table('users')->delete()
            ->where('id', $id);
    }

    public function edit($id)
    {
        return null;
    }

    public static function getByName($name)
    {
        return null;
    }
}
