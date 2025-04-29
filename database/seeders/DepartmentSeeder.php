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
            ],
            [
                'id' => 2,
                'name' => 'Кафедра Экономики и Управления',
            ],
            [
                'id' => 3,
                'name' => 'Кафедра Математики и Информатики',
            ],
            [
                'id' => 4,
                'name' => 'Кафедра Гастрономии и Гостиничного дела',
            ],
            [
                'id' => 5,
                'name' => 'Кафедра Лингвистики',
            ],
        ]);
    }
}
