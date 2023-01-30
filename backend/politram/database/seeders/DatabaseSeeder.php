<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(9)->create();

        User::factory()->create([
            'name' => 'marcos',
            'email' => 'test@example.com',
            'password' => bcrypt('123456789'),
            'phone' => fake()->phoneNumber(),
            'role' => 1
        ]);

        $this->call([
            TipoServicoSeeder::class,
            TipoVeiculoSeeder::class,
            VeiculoSeeder::class,
            ManutencaoSeeder::class,
        ]);
    }
}
