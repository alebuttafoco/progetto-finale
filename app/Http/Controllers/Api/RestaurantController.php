<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->categories != null) {
            //ddd($request);
            $request_categories = explode(',', $request->categories);
            //ddd($request_categories);
    
            //tutti i ristoranti 
            $restaurants = RestaurantResource::collection(Restaurant::orderBy('id', 'DESC')->get());
    
            //se contiene 'all' allora torno tutti i ristoranti
            if (in_array("all", $request_categories)) {
                return $restaurants;
            }
    
            //va a verificare se 
            $restaurants_array = [];
            foreach ($restaurants as $restaurant) {
                $categories = $restaurant->categories;
                foreach ($categories as $category) {
                    //ddd($category->name);
                    if (in_array($category->name, $request_categories) ) {
                        if (!in_array($restaurant, $restaurants_array)) {
                            array_push($restaurants_array, $restaurant);
                        }
                    }
                }
            }
    
            //ddd($restaurants_array);
            return $restaurants_array;
            
        }

        if ($request->id != null) {
            // $restaurant = Restaurant::find($request->id)->with('orders')->get();
            $restaurant = Restaurant::where('id', $request->id)->with('plates')->get();
            return $restaurant;
        }
        
    }

    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

}