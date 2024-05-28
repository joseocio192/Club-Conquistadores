<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @param  int  $ciudadId
     * @return array
     */
    public function definition()
    {
        $locale = $this->faker->randomElement(['es', 'en', 'ko', 'zh-Hans', 'ja', 'fr']);
        $faker = \Faker\Factory::create($locale);

        return [
            'name' => $faker->firstName,
            'apellido' => $faker->lastName, // Usar lastName sin condición redundante
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('12345678'),
            'telefono' => $faker->phoneNumber,
            'fecha_nacimiento' => $faker->date(),
            'Calle' => $faker->streetName,
            'numero_exterior' => $faker->buildingNumber,
            'numero_interior' => $faker->secondaryAddress,
            'colonia' => $faker->city,
            'ciudad_id' => 1,
            'codigo_postal' => $faker->postcode,
            'locale' => $locale,
            'sexo' => $this->generateGender($locale, $faker),
            'rol' => $this->generateRole($locale, $faker),
            'Vigente' => 1,
        ];
    }

    private function generateGender($locale, $faker)
    {
        switch ($locale) {
            case 'es':
                return $faker->randomElement(['Hombre', 'Mujer']);
            case 'en':
                return $faker->randomElement(['Man', 'women']);
            case 'ko':
                return $faker->randomElement(['남자', '여자']);
            case 'ja':
                return $faker->randomElement(['男性', '女性']);
            case 'zh-Hans':
                return $faker->randomElement(['男人', '女人']);
            case 'fr':
                return $faker->randomElement(['Homme', 'Femme']);
        }
    }

    private function generateRole($locale, $faker)
    {
        switch ($locale) {
            case 'es':
                return $faker->randomElement(['administrador', 'conquistador', 'tutor', 'directivo', 'instructor']);
            case 'en':
                return $faker->randomElement(['administrator', 'conqueror', 'tutor', 'managerial', 'instructor']);
            case 'ko':
                return $faker->randomElement(['관리자', '정복자', '가정 교사', '관리', '선생']);
            case 'zh-Hans':
                return $faker->randomElement(['管理员', '征服者', '导师', '管理', '教练']);
            case 'ja':
                return $faker->randomElement(['管理者', '征服者', 'チューター', '経営', 'インストラクター']);
            case 'fr':
                return $faker->randomElement(['administrateur', 'conquérant', 'tuteur', 'directorial', 'instructeur']);
        }
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
