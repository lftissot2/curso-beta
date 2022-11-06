<?php

namespace Database\Seeders;

use App\Models\Candidato;
use App\Models\CandidatoVaga;
use App\Models\User;
use App\Models\Vaga;
use App\Models\VagaCandidato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CandidatoVaga::factory()->count(5)->create();
        User::factory()->create(['email' => 'cand@qjobs.com']);
        User::factory()->create(['email' => 'adm@qjobs.com', 'is_admin'=>true]);
        Vaga::factory()->count(3)->create();
    }
}
