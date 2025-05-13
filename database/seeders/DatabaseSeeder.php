<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DepartmentSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PhotoSeeder::class);

        User::factory()->create([
            'surname' => 'Сисадминов',
            'name' => 'Девопс',
            'patranomic' => 'Изернетович',
            'email' => 'root@midis.ru',
            'password' => '$2y$12$Ol1AcL6jy2rysYEy5uO.2.1pLKfFGM2QzX0RUdXxxDxzU5g1x4On2',
            'tel' => null,
            'role' => 'admin',
        ]);
    }
}
