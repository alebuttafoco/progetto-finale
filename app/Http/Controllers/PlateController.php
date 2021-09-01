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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates= Plate::all();
        return view('admin.plate.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plate.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'name' => 'required',
            'image' => 'required|max:50',
            'description' => 'required',
            'price' => 'required|numeric',
            'type'=> 'required',
            'visible' => 'required|boolean',

        ]);
        
        
        
        $id = Auth::user()->id;
        $restaurant_id = Restaurant::find($id)->id;
        $validated_data['restaurant_id']= $restaurant_id;
        
        $file_path = Storage::put('plate_images', $validated_data['image']);
        $validated_data['image'] = $file_path;
        //ddd($validated_data);


        Plate::create($validated_data);
        return redirect()->route('admin.plate.index');
        /**/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        return view('admin.plate.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        return view('admin.plate.edit');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        //
    }
}