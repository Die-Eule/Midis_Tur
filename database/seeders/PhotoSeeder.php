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
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto2.png',
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto3.png',
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto4.png',
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto5.png',
                'department_id' => 3,
            ],
            [
                'path' => 'dep/3/foto6.png',
                'department_id' => 3,
            ],
            // Кафедра Гастрономии и Гостиничного дела
            // Кафедра Лингвистики
        ]);
    }
}
