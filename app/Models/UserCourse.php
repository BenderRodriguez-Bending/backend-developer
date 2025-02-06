<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCourse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'purchased_on'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCourse(int $userId, int $courseId): array
    {
        $userCourse = UserCourse::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->firstOrFail();

        $course = $userCourse->course;

        $modules = $course->modules()
            ->where(function ($query) use ($userCourse) {
                $query->whereNull('removed_on')
                    ->orWhere('removed_on', '>', $userCourse->purchased_on);
            })
            ->where(function ($query) use ($userCourse) {
                $query->whereNull('added_on')
                    ->orWhere('added_on', '<=', $userCourse->purchased_on);
            })
            ->orderBy('id')
            ->get();

        return [
            'course' => $course,
            'modules' => $modules,
        ];
    }
}
