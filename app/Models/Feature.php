<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    /**
     * @return BelongsToMany
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
}
