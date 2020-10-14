<?php

namespace App\Services;

use App\Models\Category;

class GetCategoriesService
{
    public static function getCategories()
    {
        return Category::orderBy('name')->get();
    }
}