<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use App\Http\Requests\StorevehicleRequest;
use App\Http\Requests\UpdatevehicleRequest;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //masuk ke halaman INDEX
        $vehicles = vehicle::all();
        return view('vehicle.vehicle_index', compact(('vehicles')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //masuk ke halaman create
        return view('vehicle.vehicle_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorevehicleRequest $request)
    {
        //validator untuk image
        $validator = Validator::make($request->all(),[
            'vehicle_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if an image is provided
        if ($request->hasFile('vehicle_image')) {
            $image = $request->file('vehicle_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        // Create a new vehicle record
        $data = vehicle::create([
            'vehicle_type'=>$request->vehicle_type,
            'vehicle_model' => $request->vehicle_model,
            'vehicle_year' => $request->vehicle_year,
            'vehicle_passenger_amount' => $request->vehicle_passenger_amount,
            'vehicle_manufacture' => $request->vehicle_manufacture,
            'vehicle_price'=>$request->vehicle_price,
            'vehicle_fuel_type' => $request->vehicle_fuel_type,
            'vehicle_trunk_space' => $request->vehicle_trunk_space,
            'vehicle_tire_amount' => $request->vehicle_tire_amount,
            'vehicle_cargo_space' => $request->vehicle_cargo_space,
            'vehicle_baggage_space' => $request->vehicle_baggage_space,
            'vehicle_fuel_capacity' => $request->vehicle_fuel_capacity,
            'vehicle_image' => $request->imageName,
        ]);

        return redirect()->route('vehicle.vehicle_index')->with('success', 'Vehicle created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //untuk masuk ke halaman vehicle edit berdasarkan id
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicle.vehicle_edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatevehicleRequest $request, $id)
    {
        //melakukan pengecheck apakah terdapat gambarnya atau tidak
        $vehicle_image_path = null;
        if($request->vehicle_image != null){
            $this->validate($request, [
                'vehicle_image' => 'required|image|mimes:jpg,png,jpeg,jfif,pjp,pjpeg',
            ]);
            $vehicle_image_path = $request->file('vehicle_image')->store('Image', 'public');
        }

        $vehicleType = $request->selected_value;


        //tempat memeriksa dimana apakah ada gambarnya atau tidak
        //masih terdapat bug dimana ketika melakukan update maka data akan gambar menghilang
        if ($vehicle_image_path == "") {
            vehicle::findOrFail($id)->update([
                'vehicle_type'=>$request->vehicle_type,
            'vehicle_model' => $request->vehicle_model,
            'vehicle_year' => $request->vehicle_year,
            'vehicle_passenger_amount' => $request->vehicle_passenger_amount,
            'vehicle_manufacture' => $request->vehicle_manufacture,
            'vehicle_price'=>$request->vehicle_price,
            'vehicle_fuel_type' => $request->vehicle_fuel_type,
            'vehicle_trunk_space' => $request->vehicle_trunk_space,
            'vehicle_tire_amount' => $request->vehicle_tire_amount,
            'vehicle_cargo_space' => $request->vehicle_cargo_space,
            'vehicle_baggage_space' => $request->vehicle_baggage_space,
            'vehicle_fuel_capacity' => $request->vehicle_fuel_capacity,
            ]);
        } else {
            vehicle::findOrFail($id)->update([
                'vehicle_type'=>$request->vehicle_type,
            'vehicle_model' => $request->vehicle_model,
            'vehicle_year' => $request->vehicle_year,
            'vehicle_passenger_amount' => $request->vehicle_passenger_amount,
            'vehicle_manufacture' => $request->vehicle_manufacture,
            'vehicle_price'=>$request->vehicle_price,
            'vehicle_fuel_type' => $request->vehicle_fuel_type,
            'vehicle_trunk_space' => $request->vehicle_trunk_space,
            'vehicle_tire_amount' => $request->vehicle_tire_amount,
            'vehicle_cargo_space' => $request->vehicle_cargo_space,
            'vehicle_baggage_space' => $request->vehicle_baggage_space,
            'vehicle_fuel_capacity' => $request->vehicle_fuel_capacity,
            'vehicle_image' => $request->imageName,
            ]);
        }


        return redirect()->route('vehicle.vehicle_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //digunakan untuk delete data pada tempat yang spesifik berdasarkan ID dan mengembalikan ke halaman index
        vehicle::findOrFail($id)->delete();
        return redirect()->route('vehicle.vehicle_index');
    }
}
