<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            // Кафедра Дизайна
            // Кафедра Экономики и Управления
            // Кафедра Математики и Информатики
            [
                'id' => 1,
                'description' => 'Работа студента 3 курса, Килиной Ирины',
                'department_id' => 3,
            ],
            [
                'id' => 2,
                'description' => 'Работа студента 4 курса, Бусыгиной Юлии',
                'department_id' => 3,
            ],
            [
                'id' => 3,
                'description' => 'Работа студента 2 курса, Эдварда Каллена',
                'department_id' => 3,
            ],
            // Кафедра Гастрономии и Гостиничного дела
            // Кафедра Лингвистики
        ]);
    }
}
