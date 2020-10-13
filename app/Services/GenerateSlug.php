<?php

namespace App\Services;

use Illuminate\Support\Str;

/**
 * @property  model
 */
class GenerateSlug
{
    private $id;
    private $model;

    public function __construct($model, $id = null)
    {
        $this->id = $id;
        $this->model = $model;
    }

    public function generate($name, $increment = 1)
    {
        $slug = Str::slug($name);

        $exists = $this->model->where('slug', $slug)
            ->when($this->id, function ($q) {
                $q->where('id', '!=', $this->id);
            })->exists();

        if ($exists) {
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