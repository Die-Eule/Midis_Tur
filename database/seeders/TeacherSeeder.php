<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            // Кафедра Дизайна
            [
                'surname' => 'Дизайнер',
                'name' => 'Мойша',
                'middlename' => 'Израилевич',
                'pic' => 'dep/lehrer.png',
                'position' => 'Заведующий кафедрой',
                'department_id' => 1,
            ],
            // Кафедра Экономики и Управления
            [
                'surname' => 'Петухов',
                'name' => 'Пётр',
                'middlename' => 'Петрович',
                'pic' => 'dep/lehrer.png',
                'position' => 'Заведующий кафедрой',
                'department_id' => 2,
            ],
            // Кафедра Математики и Информатики
            [
                'surname' => 'Кондаков',
                'name' => 'Сергей',
                'middlename' => 'Александрович',
                'pic' => 'dep/3/lehrer001.png',
                'position' => 'Заведующий кафедрой математики и информатики',
                'department_id' => 3,
            ],
            [
                'surname' => 'Прилепина',
                'name' => 'Елена',
                'middlename' => 'Васильевна',
                'pic' => 'dep/3/lehrer002.png',
                'position' => 'Методист КМиИ',
                'department_id' => 3,
            ],
            [
                'surname' => 'Горанов',
                'name' => 'Павел',
                'middlename' => 'Сергеевич',
                'pic' => 'dep/3/lehrer003.png',
                'position' => 'Преподаватель',
                'department_id' => 3,
            ],
            [
                'surname' => 'Баженов',
                'name' => 'Максим',
                'middlename' => 'Андреевич',
                'pic' => 'dep/3/lehrer004.png',
                'position' => 'Преподаватель',
                'department_id' => 3,
            ],
            // Кафедра Гастрономии и Гостиничного дела
            [
                'surname' => 'Крабова',
                'name' => 'Креветка',
                'middlename' => 'Соусовна',
                'pic' => 'dep/lehrer.png',
                'position' => 'Заведующий кафедрой',
                'department_id' => 4,
            ],
            // Кафедра Лингвистики
            [
                'surname' => 'Иностранцев',
                'name' => 'Скороговор',
                'middlename' => 'Болоболович',
                'pic' => 'dep/lehrer.png',
                'position' => 'Заведующий кафедрой',
                'department_id' => 5,
            ],
        ]);
    }
}
