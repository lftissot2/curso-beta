<?php

namespace Database\Factories;

use App\Models\User as ModelsUser;
use App\Models\Vaga;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatoVagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vaga_id' => Vaga::factory()->create()->id,
            'user_id' => ModelsUser::factory()->create()->id,
        ];
    }
}
