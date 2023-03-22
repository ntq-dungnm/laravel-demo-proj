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
        Category::create([
            'title' => $category['title'],
            'description' => $category['description'],
            'slug' => 'category-' . str_replace(' ', '-', strtolower($category['title'])),
        ]);
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
