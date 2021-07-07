<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagesRel()
    {
        return $this->hasMany(Project_images::class,'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catRelation()
    {
        return $this->belongsTo(Categories::class,'cat_id');
    }
}
