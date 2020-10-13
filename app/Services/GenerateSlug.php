<?php

namespace App\Services;

use Illuminate\Support\Str;

/**
 * @property  model
 */
class GenerateSlug
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function generate($name, $increment = 1)
    {
        $slug = Str::slug($name);

        if ($this->model->where('slug', $slug)->exists()) {
            if ($increment > 0) {
                $minus1 = $increment-1;
                $slug = str_replace('-'.$minus1, '', $slug);
            }
            return $this->generate($slug.'-'.$increment, $increment+1);
        } else {
            return $slug;
        }
    }
}