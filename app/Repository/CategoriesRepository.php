<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;
use Illuminate\Support\Carbon;
use  App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoriesRepository implements BaseRepository
{
    // protected $categoriesRepository;

    // public function __construct(UserRepository $categoriesRepository)
    // {
    //     $this->categoriesRepository = $categoriesRepository;
    // }

    public function getById($id)
    {
        return Category::where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return Category::all();
    }

    public static function create($category)
    {
       $hehe = Category::create([
            'title' => $category['category_title'],
            'created_at'=>Carbon::now(),
        ]);
        return $hehe;
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
    }
}
