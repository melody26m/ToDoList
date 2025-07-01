<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suggestion extends Model
{
     public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
