<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Создаем пользователей
        $user1 = User::factory()->create([
            'id' => 1,
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::factory()->create([
            'id' => 2,
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
        ]);

        // Создаем курс "Косметолог"
        $course = Course::factory()->create([
            'id' => 1,
            'name' => 'Косметолог',
            'is_modular' => true,
        ]);

        // Создаем модули для курса
        Module::factory()->create([
            'name' => 'Основы эстетической косметологии',
            'course_id' => $course->id,
            'added_on' => '2025-01-01', // Добавлен 1 января 2025
            'removed_on' => null, // не удален
        ]);
        Module::factory()->create([
            'name' => 'Обзор ведущих брендов',
            'course_id' => $course->id,
            'added_on' => '2025-01-01', // Добавлен 1 января 2025
            'removed_on' => null, // не удален
        ]);
        Module::factory()->create([
            'name' => 'Основы нутрициологии',
            'course_id' => $course->id,
            'added_on' => '2025-01-01', // Добавлен 1 января 2025
            'removed_on' => null, // не удален
        ]);
        Module::factory()->create([
            'name' => 'Лечебное питание в косметологии',
            'course_id' => $course->id,
            'added_on' => '2025-01-01', // Добавлен 1 января 2025
            'removed_on' => '2025-01-31', // Удалён после 1 февраля 2025
        ]);
        Module::factory()->create([
            'name' => 'Фракционная мезотерапия',
            'course_id' => $course->id,
            'added_on' => '2025-02-01', // Добавлен 1 февраля 2025
            'removed_on' => null, // не удален
        ]);

        // Создаем записи о покупке курса пользователями
        UserCourse::factory()->create([
            'user_id' => $user1->id,
            'course_id' => $course->id,
            'purchased_on' => '2025-01-10', // Пользователь 1 купил курс 10 января 2025
        ]);

        UserCourse::factory()->create([
            'user_id' => $user2->id,
            'course_id' => $course->id,
            'purchased_on' => '2025-02-02', // Пользователь 2 купил курс 2 февраля 2025
        ]);
    }
}
