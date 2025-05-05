<?php

namespace Database\Seeders;

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
        $this->call(PhotoSeeder::class);
    }
}
