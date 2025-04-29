<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert([
            [
                'id' => 1,
                'name' => 'Колледж на базе 9-ти классов',
            ],
            [
                'id' => 2,
                'name' => 'Колледж на базе 11-ти классов',
            ],
            [
                'id' => 3,
                'name' => 'Институт',
            ],
        ]);
    }
}
