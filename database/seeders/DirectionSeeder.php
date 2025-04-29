<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directions')->insert([
            // колледж (9 классов)
            [
                'id' => 1,
                'name' => 'Дизайн',
                'level_id' => 1,
                'department_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Экономика и управление',
                'level_id' => 1,
                'department_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'IT-технологии',
                'level_id' => 1,
                'department_id' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Туризм и гостеприимство',
                'level_id' => 1,
                'department_id' => 4,
            ],
            // колледж (11 классов)
            [
                'id' => 5,
                'name' => 'Дизайн',
                'level_id' => 2,
                'department_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Экономика и управление',
                'level_id' => 2,
                'department_id' => 2,
            ],
            [
                'id' => 7,
                'name' => 'IT-технологии',
                'level_id' => 2,
                'department_id' => 3,
            ],
            [
                'id' => 8,
                'name' => 'Туризм и гостеприимство',
                'level_id' => 2,
                'department_id' => 4,
            ],
            // институт
            [
                'id' => 9,
                'name' => 'Дизайн',
                'level_id' => 3,
                'department_id' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Экономика и управление',
                'level_id' => 3,
                'department_id' => 2,
            ],
            [
                'id' => 11,
                'name' => 'IT-технологии',
                'level_id' => 3,
                'department_id' => 3,
            ],
            [
                'id' => 12,
                'name' => 'Ресторанный и гостиничный бизнес',
                'level_id' => 3,
                'department_id' => 4,
            ],
            [
                'id' => 13,
                'name' => 'Лингвистика',
                'level_id' => 3,
                'department_id' => 5,
            ],
        ]);
    }
}
