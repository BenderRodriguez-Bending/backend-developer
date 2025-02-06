<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    public function show($userId, $courseId): View
    {
        $userCourse = new UserCourse();
        $result = $userCourse->getCourse($userId, $courseId);

        // Извлекаем данные из массива
        $course = $result['course'];
        $modules = $result['modules'];

        // Передаем данные в шаблон
        return view('course.show', compact('course', 'modules'));
    }
}
