<?php

use App\Order;
use App\Plate;
use App\Restaurant;
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
       
        $restaurant = Restaurant::all();
        $tot_restaurant = count($restaurant);
        
        for ($i=1; $i <= $tot_restaurant ; $i++) { 
            $restaurant_chose = Restaurant::find($i); //RANDOM RESTAURANT
            $restaurant_id = $restaurant_chose->id;
            $plate_of_restaurant = Plate::where('restaurant_id', $restaurant_id)->get();
            $array_id_plates = [];
            foreach ($plate_of_restaurant as $plate) {
                array_push($array_id_plates, $plate->id);
            };
            $count_id_plates = count($array_id_plates);
            
            $customer_number = count(Order::all()); 
            
            for($j=1; $j <= 500; $j++) {
            $random_plate = rand(1, $count_id_plates); //RANDOM ID PLATE
            $gino = $array_id_plates[$random_plate-1];
            $plate_random = Plate::find($gino);
    
            $random_customer_id = rand(1, $customer_number);
    
            $random_quantity = rand(1,10);
    
            DB::table('order_plate')->insert([
            'quantity' =>$random_quantity,
            'plate_id' =>$plate_random->id,
            'order_id' =>$random_customer_id,
            ]);
            }
            
        }



    }
}