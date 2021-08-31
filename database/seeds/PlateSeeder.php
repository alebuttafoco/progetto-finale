<?php
use Faker\Generator as Faker;
use App\Plate;
use Illuminate\Database\Seeder;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $plate = new Plate();
            $plate->name = $faker->sentence(5);
            $plate->image = 'https://picsum.photos/200/300';
            $plate->description = $faker->paragraph();
            $plate->price = $faker->randomFloat(2,0,59);
            $plate->type = $faker->word();
            $plate->visible = $faker->boolean();
            $plate->save();
        }
    }
}
