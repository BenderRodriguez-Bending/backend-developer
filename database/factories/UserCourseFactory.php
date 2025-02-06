<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserCourse;

/**
 * @extends Factory<UserCourse>
 */
class UserCourseFactory extends Factory
{
    protected $model = UserCourse::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'course_id' => \App\Models\Course::factory(),
            'purchased_on' => $this->faker->date,
        ];
    }
}
