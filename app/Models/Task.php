<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Suggestion;

class Task extends Model
{
    // ✅ Allow these fields to be safely mass-assigned
   protected $fillable = ['title', 'description', 'deadline', 'status', 'user_id'];


    // 🔗 Define the relationship to suggestions
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }
}
