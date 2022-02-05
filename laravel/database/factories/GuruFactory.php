<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nip' => 1234567,
            'jabatan' => 'guru mata pelajaran',
            'pendidikan' => 'S1',
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'agama' => 'islam',
            'telp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'photo' => 'imageuser.jpg'
        ];
    }
}
