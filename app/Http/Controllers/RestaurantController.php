<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable | exists:categories,id',
            'name' => 'required | max:255',
            'description' => 'required | max:255',
            'img' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,JPG,JPEG,PNG,BMP,GIF,SVG,WEBP | max:1050',
            'address' => 'max:255',
            'city' => 'required | max:255',
            'cap' => 'required | digits:5',
            'piva' => 'required | digits:11',
        ]);

        //ddd($validatedData);

        if (in_array('img', $validatedData)) {
            // Se esiste l'immagine spostala nello spazio web dedicato all'archiviazione
            $cover_img = Storage::disk('public')->put('PERCORSO', $request->img);
            $validatedData['img'] = $cover_img;
        } else {
            // se non esiste, usa l'immagine dentro l'asset e valida i dati nuovamente
            $validatedData = $request->validate([
                'category_id' => 'nullable | exists:categories,id',
                'name' => 'required | max:255',
                'description' => 'required | max:255',
                'img' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,JPG,JPEG,PNG,BMP,GIF,SVG,WEBP | max:1050',
                'address' => 'max:255',
                'city' => 'required | max:255',
                'cap' => 'required | digits:5',
                'piva' => 'required | digits:11',
            ]);
        }

        $restaurant = Restaurant::create($validatedData);
        return redirect()->route('restaurant.show', $restaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable | exists:categories,id',
            'name' => 'required | max:255',
            'description' => 'required | max:255',
            'img' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,JPG,JPEG,PNG,BMP,GIF,SVG,WEBP | max:1050',
            'address' => 'max:255',
            'city' => 'required | max:255',
            'cap' => 'required | digits:5',
            'piva' => 'required | digits:11',
        ]);

        /* 
        Se "img" ovvero l'array di modifica è vuoto, ovvero falso, non fare nulla
        se è vero, quindi nuova immagine, esegui il codice
         */
        if (array_key_exists('img', $validatedData)) {

            Storage::disk('public')->delete($restaurant->img);
            $cover_img = Storage::disk('public')->put('PERCORSO', $request->img);
            $validatedData['img'] = $cover_img;
        }

        $restaurant->update($validatedData);
        return redirect()->route('restaurant.show', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}