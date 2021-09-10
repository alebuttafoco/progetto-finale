<?php

use App\Order;
use App\Plate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;


class OrderPlateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

        $plate_number = count(Plate::all());
        $order_number = count(Order::all());

        for($i=1; $i <= 500; $i++) {

            DB::table('order_plate')->insert([
                'quantity' => $faker->numberBetween(1, 10),
                'plate_id' =>  $faker->numberBetween(1, $plate_number),
                'order_id' =>  $faker->numberBetween(1, $order_number),
            ]);


        }

    }
}