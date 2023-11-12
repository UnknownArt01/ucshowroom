@extends('layout.app')
@section('content')

{{-- form yang digunakan untuk menyimpan kendaraan baru --}}
<form action="{{ route('vehicle.vehicle_store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="vehicle_type">Vehicle Type:</label>
        <select class="form-control" id="vehicle_type" name="vehicle_type" required>
            <option selected disabled value=""></option>
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
            <option value="Truck">Truck</option>
        </select>
    </div>
    <div class="form-group">
        <label for="vehicle_model">Model:</label>
        <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" required>
    </div>

    <div class="form-group">
        <label for="vehicle_year">Year:</label>
        <input type="number" class="form-control" id="vehicle_year" name="vehicle_year" required>
    </div>
    <div class="form-group">
        <label for="vehicle_passenger_amount">Passenger Amount:</label>
        <input type="number" class="form-control" id="vehicle_passenger_amount" name="vehicle_passenger_amount" required>
    </div>
    <div class="form-group">
        <label for="vehicle_manufacture">Manufacture:</label>
        <input type="text" class="form-control" id="vehicle_manufacture" name="vehicle_manufacture" required>
    </div>
    <div class="form-group">
        <label for="vehicle_price">Price:</label>
        <input type="number" class="form-control" id="vehicle_price" name="vehicle_price" required>
    </div>

    <div class="form-group">
        <label for="vehicle_fuel_type">Fuel Type:</label>
        <select class="form-control" id="vehicle_fuel_type" name="vehicle_fuel_type" required>
            <option value="Gasoline">Gasoline</option>
            <option value="Diesel">Diesel</option>
        </select>
    </div>

    <!-- Kolom-kolom yang ditambahkan berdasarkan tipe kendaraan -->


    <div class="form-group" id="trunkSpaceGroup">
        <label for="vehicle_trunk_space">Trunk Space:</label>
        <input type="text" class="form-control" id="vehicle_trunk_space" name="vehicle_trunk_space">
    </div>

    <div class="form-group" id="tireAmountGroup">
        <label for="vehicle_tire_amount">Tire Amount:</label>
        <input type="number" class="form-control" id="vehicle_tire_amount" name="vehicle_tire_amount">
    </div>

    <div class="form-group" id="CargoSpaceGroup">
        <label for="vehicle_cargo_space">Cargo Space:</label>
        <input type="text" class="form-control" id="vehicle_cargo_space" name="vehicle_cargo_space">
    </div>

    <div class="form-group" id="baggageSpaceGroup">
        <label for="vehicle_baggage_space">Baggage Space:</label>
        <input type="text" class="form-control" id="vehicle_baggage_space" name="vehicle_baggage_space">
    </div>

    <div class="form-group">
        <label for="vehicle_fuel_capacity">Fuel Capacity:</label>
        <input type="text" class="form-control" id="vehicle_fuel_capacity" name="vehicle_fuel_capacity" required>
    </div>
    {{-- untuk upload foto terbaru --}}
    <div class="form-group">
        <label for="vehicle_image">Vehicle Image:</label>
        <input type="file" class="form-control-file" id="vehicle_image" name="vehicle_image" accept="image/*" required>
        <small class="form-text text-muted">Upload an image for the vehicle.</small>
    </div>

    <!--  input untuk kolom- -->
    <button type="submit" class="btn btn-primary">Add Vehicle</button>
</form>
</div>
@endsection
