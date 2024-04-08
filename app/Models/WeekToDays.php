<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeekToDays extends Model
{
    use HasFactory;
    protected $fillable = ['NumberOfDays', 'VideoName', 'VideoUrl', 'weekId'];


    public function WeekToDaysRel(): BelongsTo
    {
        return $this->belongsTo(coursesWeeks::class, 'weekId');
    }
}
