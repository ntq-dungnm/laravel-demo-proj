<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoriesRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoryRepository = $categoriesRepository;
    }

    public function getCategory()
    {
        return view('admin.addCategory');
    }

    public function addCategory(Request $req)
    {
        $category = $req->all();
            $this->categoryRepository->create($category);
    }
}
