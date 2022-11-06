<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class VagaFactory extends Factory
{
    use WithFaker;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker()->jobTitle(),
            'descricao' => $this->faker()->text(40),
            'ativa' => $this->faker()->boolean(60),
            'tipo' => ceil(rand(0,2)),
        ];
    }
}
