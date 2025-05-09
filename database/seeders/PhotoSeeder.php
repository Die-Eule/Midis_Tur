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
                'path' => 'dep/3/foto1.png',
                'ptoject_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto2.png',
                'ptoject_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto3.png',
                'ptoject_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto4.png',
                'ptoject_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto5.png',
                'ptoject_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto6.png',
                'ptoject_id' => 0,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/prj1_1.png',
                'ptoject_id' => 1,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/prj1_1.png',
                'ptoject_id' => 1,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/prj1_1.png',
                'ptoject_id' => 1,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/job1.png',
                'ptoject_id' => 2,
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/prj1_1.png',
                'ptoject_id' => 3,
                'department_id' => 3,
            ],
            // Кафедра Гастрономии и Гостиничного дела
            // Кафедра Лингвистики
        ]);
    }
}
