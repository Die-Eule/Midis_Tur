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
                'author' => 'Килина Ирина',
                'grade' => 1,
                'year' => 3,
                'department_id' => 3,
            ],
            [
                'id' => 2,
                'author' => 'Бусыгина Юлия',
                'grade' => 3,
                'year' => 4,
                'department_id' => 3,
            ],
            [
                'id' => 3,
                'author' => 'Эдвард Каллен',
                'grade' => 1,
                'year' => 2,
                'department_id' => 3,
            ],
            // Кафедра Гастрономии и Гостиничного дела
            // Кафедра Лингвистики
        ]);
    }
}
