<?php

namespace App\Http\Controllers;

use App\Plate;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $restaurants = Restaurant::where('user_id', $id)->get();


        $restaurant_id = $restaurants[0]->id;
        $plates = Plate::where('restaurant_id', $restaurant_id)->orderBy('name', 'ASC')->get();

        if (($plates->count() === 0)) {
            $plates = false;
            return view('admin.plate.index', compact('plates'));
        }
        return view('admin.plate.index', compact('plates'));
    }


    public function create()
    {
        return view('admin.plate.create');
    }


    public function store(Request $request)
    {
        //validation
        $validated_data = $request->validate([
            'name' => 'required | max:255',
            'image' => 'required | mimes:jpg,jpeg,png,bmp,gif,svg,webp,JPG,JPEG,PNG,BMP,GIF,SVG,WEBP | max:50',
            'description' => 'required | max:1000',
            'price' => 'required | numeric | between: 0,999',
            'type' => 'required',
            'visible' => 'required | boolean',
        ]);

        //take restaurant id
        $id = Auth::user()->id;


        $restaurants = Restaurant::where('user_id', $id)->get();
        if (!($restaurants->count() === 0)) {
            $restaurant_id = $restaurants[0]->id;
            $validated_data['restaurant_id'] = $restaurant_id;
        }


        //image
        $file_path = Storage::put('plate_images', $validated_data['image']);
        $validated_data['image'] = $file_path;


        //ddd($validated_data);
        Plate::create($validated_data);
        return redirect()->route('admin.plate.index');
        /**/
    }


    public function show(Plate $plate)
    {
        return view('admin.plate.show', compact('plate'));
    }


    public function edit(Plate $plate)
    {
        return view('admin.plate.edit', compact('plate'));
    }


    public function update(Request $request, Plate $plate)
    {

        $validated_data = $request->validate([
            'name' => 'required | max:255',
            'image' => 'required | mimes:jpg,jpeg,png,bmp,gif,svg,webp,JPG,JPEG,PNG,BMP,GIF,SVG,WEBP | max:50',
            'description' => 'required | max:1000',
            'price' => 'required | numeric | between: 0,999',
            'type' => 'required',
            'visible' => 'required | boolean',
        ]);

        //take restaurant id
        $id = Auth::user()->id;
        $restaurant_id = Restaurant::find($id)->id;
        $validated_data['restaurant_id'] = $restaurant_id;

        //controll image
        if (array_key_exists('image', $validated_data)) {
            $file_path = Storage::put('plate_images', $validated_data['image']);
            $validated_data['image'] = $file_path;
            Storage::delete($plate->image);
        }

        $plate->update($validated_data);

        return redirect()->route('admin.plate.show', $plate->id);
    }


    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route('admin.plate.index');
    }
}