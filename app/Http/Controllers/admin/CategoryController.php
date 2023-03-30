<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoriesRepository;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
    private $categoryRepository;
    // private $categoryRequest;

    public function __construct(
        CategoriesRepository $categoryRepository
        // AddCategoryRequest $categoryRequest
    ) {
        $this->categoryRepository = $categoryRepository;
        // $this->categoryRequest = $categoryRequest;
    }

    public function show()
    {
        return view('admin.addCategory');
    }

    public function store(AddCategoryRequest $req)
    {
        $category = $req->all();

        $this->categoryRepository->create($category);
    }
}
