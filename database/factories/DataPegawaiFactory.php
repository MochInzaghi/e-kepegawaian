<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DataPegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namapegawai' => $this->faker->name,
            'nip' => $this->faker->randomNumber(8, true),
            'ttl' => $this->faker->date('Y-m-d'),
            'pangkat' => $this->faker->word(),
            'jenjang' => $this->faker->word(),
            'jabatan' => $this->faker->word(),
            'notelp' => $this->faker->phoneNumber,
            'kgb' => $this->faker->date('Y-m-d'),
            'kp' => $this->faker->word(),
            'gajipokok' => $this->faker->randomNumber(5, true),
            'keterangan' => $this->faker->word,
        ];
    }
}
