<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class daysPdf extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function daysPdfRel(): BelongsTo
    {
        return $this->belongsTo(WeekToDays::class,'dayId ');
    }
}
