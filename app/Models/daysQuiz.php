<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class daysQuiz extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function daysQuizRel(): BelongsTo
    {
        return $this->belongsTo(WeekToDays::class,'dayId ');
    }

}
