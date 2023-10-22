<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computers>
 */
class ComputersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'so'=>$this->faker->windowsPlatformToken(), 
            'ofimatica'=>$this->faker->name(), 
            'cpu'=>$this->faker->macProcessor(), 
            'storage'=>$this->faker->phoneNumber(), 
            'ram'=>$this->faker->phoneNumber(), 
            'ip'=>$this->faker->unique()->localIpv4(), 
            'mac'=>$this->faker->macAddress(), 
            'serial'=>$this->faker->imei(), 
            'fixed_asset'=>$this->faker->imei(), 
            'anydesk'=>$this->faker->imei(), 
            'printer'=>$this->faker->name(), 
            'scanner'=>$this->faker->name(),
            'dependencies_id'=>$this->faker->numberBetween(1,6),
        ];
    }
}
