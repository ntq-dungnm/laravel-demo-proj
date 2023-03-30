<?php

namespace App\Services;

use  App\Repository\CategoriesRepository;

class CategoriesService
{
    protected $categoryRepository;

    public function __construct(CategoriesRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return  $this->categoryRepository->getAll();
    }
}
