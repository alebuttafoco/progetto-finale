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



        $category= ['pizza', 'pasta', 'vegetariano', 'carne', 'indiano', 'sushi', 'kebab', 'messicano', 'carne', 'vegano'];
        for ($i=0; $i < 10; $i++) { 
            $category = new Category();
            $category->name = $category[$i];
            $category->image = "https://picsum.photos/seed/picsum/536/354";
            $category->save();
        }
    }
}