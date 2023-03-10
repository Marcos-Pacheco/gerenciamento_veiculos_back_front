<?php

namespace Database\Seeders;

use App\Models\Manutencao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManutencaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manutencao::factory()->count(10)->create();
    }
}
