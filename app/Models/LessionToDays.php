<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LessionToDays extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function dayRel(): BelongsTo
    {
        return $this->belongsTo(WeekToDays::class,'dayId');
    }

    public function weekRel(): BelongsTo
    {
        return $this->belongsTo(WeekToDays::class,'weekId');
    }

    public function coursesRel(): BelongsTo
    {
        return $this->belongsTo(WeekToDays::class,'quizId');
    }
    
    public function pdfRel(): BelongsTo
    {
        return $this->belongsTo(WeekToDays::class,'pdfId');
    }
}
