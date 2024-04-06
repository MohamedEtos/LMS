<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class coursesWeeks extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function coursesWeeksRel(): BelongsTo
    {
        return $this->belongsTo(courses::class,'coursesId ');
    }
}
