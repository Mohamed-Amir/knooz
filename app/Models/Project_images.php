<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_images extends Model
{
    public function projectRel()
    {
        return $this->belongsTo(Projects::class,'project_id');
    }
}
