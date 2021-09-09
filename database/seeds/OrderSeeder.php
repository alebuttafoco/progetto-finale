<?php

use App\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 100; $i++) { 
            $order = new Order();
            $order->customer_name = $faker->firstName();
            $order->customer_lastname = $faker->lastName();
            $order->customer_address = $faker->address();
            $order->status = 'completato';
            $order->date = $faker->dateTimeBetween('-2 month', '+1 month');
            $order->total_price = $faker->randomFloat(2,0,1000);
            $order->save();
        }
    }
}