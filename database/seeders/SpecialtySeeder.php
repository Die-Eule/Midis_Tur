<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specialties')->insert([
            // колледж (9 классов)
            [
                'name' => 'Графический дизайн и брендинг',
                'direction_id' => 1,
            ],
            [
                'name' => '3D Моделирование для компьютерных игр',
                'direction_id' => 1,
            ],
            [
                'name' => 'Дизайн одежды и аксессуаров',
                'direction_id' => 1,
            ],
            [
                'name' => 'Дизайн интерьера',
                'direction_id' => 1,
            ],
            [
                'name' => 'Веб-дизайн и мобильная разработка',
                'direction_id' => 1,
            ],
            [
                'name' => 'Предпринимательство и интернет-маркетинг',
                'direction_id' => 2,
            ],
            [
                'name' => 'Организация кредитных и расчетных банковских операций',
                'direction_id' => 2,
            ],
            [
                'name' => 'Разработка веб и мультимедийных приложений',
                'direction_id' => 3,
            ],
            [
                'name' => 'Администрирование отеля и организация экскурсионных услуг',
                'direction_id' => 4,
            ],
            // колледж (11 классов)
            [
                'name' => 'Графический дизайн и брендинг',
                'direction_id' => 5,
            ],
            [
                'name' => '3D Моделирование для компьютерных игр',
                'direction_id' => 5,
            ],
            [
                'name' => 'Дизайн одежды и аксессуаров',
                'direction_id' => 5,
            ],
            [
                'name' => 'Дизайн интерьера',
                'direction_id' => 5,
            ],
            [
                'name' => 'Веб-дизайн и мобильная разработка',
                'direction_id' => 5,
            ],
            [
                'name' => 'Предпринимательство и интернет-маркетинг',
                'direction_id' => 6,
            ],
            [
                'name' => 'Организация кредитных и расчетных банковских операций',
                'direction_id' => 6,
            ],
            [
                'name' => 'Разработка веб и мультимедийных приложений',
                'direction_id' => 7,
            ],
            [
                'name' => 'Администрирование отеля и организация экскурсионных услуг',
                'direction_id' => 8,
            ],
            // институт
            [
                'name' => 'Цифровая графика в индустрии компьютерных игр',
                'direction_id' => 9,
            ],
            [
                'name' => 'Графический дизайн и брендинг',
                'direction_id' => 9,
            ],
            [
                'name' => 'Дизайн среды',
                'direction_id' => 9,
            ],
            [
                'name' => 'Дизайн одежды и маркетинг в модной индустрии',
                'direction_id' => 9,
            ],
            [
                'name' => 'Web-дизайн и мобильная разработка',
                'direction_id' => 9,
            ],
            [
                'name' => 'Промышленный дизайн',
                'direction_id' => 9,
            ],
            [
                'name' => 'Гастрономический дизайн',
                'direction_id' => 9,
            ],
            [
                'name' => 'Менеджмент в ресторанном и гостиничном бизнесе',
                'direction_id' => 12,
            ],
            [
                'name' => 'Управление бизнес-процессами в гастрономии',
                'direction_id' => 12,
            ],
            [
                'name' => 'Управление в гостиничном бизнесе',
                'direction_id' => 12,
            ],
            [
                'name' => 'Разработка компьютерных игр и приложений с виртуальной и дополненной реальностью (VR/AR)',
                'direction_id' => 11,
            ],
            [
                'name' => 'Разработка веб- и мобильных приложений',
                'direction_id' => 11,
            ],
            [
                'name' => 'Управление IT-проектами',
                'direction_id' => 11,
            ],
            [
                'name' => 'Перевод и международные бизнес-коммуникации',
                'direction_id' => 13,
            ],
            [
                'name' => 'Управление бизнесом и интернет-маркетинг',
                'direction_id' => 10,
            ],
            [
                'name' => 'Продюсирование и маркетинг мероприятий',
                'direction_id' => 10,
            ],
        ]);
    }
}
