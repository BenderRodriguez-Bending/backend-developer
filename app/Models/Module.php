<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'course_id', 'added_on', 'removed_on'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
