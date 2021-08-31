<?php

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $category = new Category();
            $category->name = $faker->word();
            $category->image = "https://picsum.photos/seed/picsum/536/354";
            $category->save();
        }
    }
}
