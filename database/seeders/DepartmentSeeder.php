<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'Кафедра Дизайна',
                'pic' => '',
                'video' => '',
            ],
            [
                'id' => 2,
                'name' => 'Кафедра Экономики и Управления',
                'pic' => '',
                'video' => '',
            ],
            [
                'id' => 3,
                'name' => 'Кафедра Математики и Информатики',
                'pic' => 'dep/3/students.png',
                'video' => 'videos/dep/3/tour.mp4',
            ],
            [
                'id' => 4,
                'name' => 'Кафедра гостеприимства и международных бизнес-коммуникаций',
                'pic' => '',
                'video' => '',
            ],
            [
                'id' => 5,
                'name' => 'Кафедра Лингвистики',
                'pic' => '',
                'video' => '',
            ],
        ]);
    }
}
