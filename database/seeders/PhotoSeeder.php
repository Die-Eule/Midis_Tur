<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photos')->insert([
            // Кафедра Дизайна
            // Кафедра Экономики и Управления
            // Кафедра Математики и Информатики
            [
                'path' => 'images/dep/3/foto1.png',
                'project_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'images/dep/3/foto2.png',
                'project_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'images/dep/3/foto3.png',
                'project_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'images/dep/3/foto4.png',
                'project_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'images/dep/3/foto5.png',
                'project_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'images/dep/3/foto6.png',
                'project_id' => 0,
                'department_id' => 3,
            ],
            //      project 1
            [
                'path' => 'images/dep/3/prj1_1.png',
                'project_id' => 1,
                'department_id' => 3,
            ],
            //      project 2
            [
                'path' => 'images/dep/3/job1.png',
                'project_id' => 2,
                'department_id' => 3,
            ],
            // Кафедра Гастрономии и Гостиничного дела
            // Кафедра Лингвистики
        ]);
    }
}
