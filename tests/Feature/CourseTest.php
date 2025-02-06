<?php

namespace Tests\Feature;

use Tests\TestCase;

class CourseTest extends TestCase
{

    public function test_course_composition_for_user_1()
    {
        // Тест для пользователя 1
        $response = $this->get('/course/1/1');
        $response->assertStatus(200);
        $response->assertSeeInOrder([
            '1. Основы эстетической косметологии',
            '2. Обзор ведущих брендов',
            '3. Основы нутрициологии',
            '4. Лечебное питание в косметологии',
        ]);
    }

    public function test_course_composition_for_user_2()
    {
        // Тест для пользователя 2
        $response = $this->get('/course/2/1');
        $response->assertStatus(200);
        $response->assertSeeInOrder([
            '1. Основы эстетической косметологии',
            '2. Обзор ведущих брендов',
            '3. Основы нутрициологии',
            '4. Фракционная мезотерапия',
        ]);
    }
}
