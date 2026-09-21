<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nip'       => $this->faker->unique()->numerify('##########'),
            'nama_guru' => $this->faker->name(),
            'mapel'     => $this->faker->randomElement(['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'IPA', 'IPS']),
            'foto'      => null,
            'deskripsi' => $this->faker->sentence(),
        ];
    }
}
