<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $restaurant = new Restaurant();
            $restaurant->user_id = $i + 1;
            $restaurant->name = $faker->words(3, true);
            $restaurant->image = 'https://picsum.photos/seed/picsum/536/354';
            $restaurant->address = $faker->streetAddress();
            $restaurant->cap = $faker->postcode();
            $restaurant->city = $faker->cityPrefix();
            $restaurant->description = $faker->paragraph();
            $restaurant->piva = $faker->numberBetween(10000000000, 99999999999);
            $restaurant->save();
        }
    }
}
