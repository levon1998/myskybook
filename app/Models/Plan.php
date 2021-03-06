<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    /**
     * @return BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
