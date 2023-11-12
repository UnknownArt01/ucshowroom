@extends('layout.app')
@section('content')
<div class="container mt-4">
    <h2>Vehicle List</h2>

    <div class="mb-3">
        <a href="{{ route('vehicle.vehicle_create') }}" class="btn btn-primary">Create Vehicle</a>
        <label for="vehicleTypeFilter" class="ml-3">Filter by Vehicle Type:</label>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Model</th>
                <th>Year</th>
                <th>Manufacture</th>
                <th>Passenger Amount</th>
                <th>Fuel Type</th>
                <th>Picture</th>
                <th>Action</th>

            </tr>
        </thead>
        {{-- untuk looping menampilkan data dari vehicle --}}
        <tbody>
            @forelse($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->vehicle_type }}</td>
                    <td>{{ $vehicle->vehicle_model }}</td>
                    <td>{{ $vehicle->vehicle_year }}</td>
                    <td>{{ $vehicle->vehicle_manufacture }}</td>
                    <td>{{ $vehicle->vehicle_passenger_ammount }}</td>
                    <td>{{ $vehicle->vehicle_fuel_type }}</td>
                    <td>
                        <img src="{{ url('/storage/' . $vehicle->vehicle_image) }}" alt="{{ $vehicle->title }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->title }}</h5>
                        </div>
                    </div>
                    <td>
                        {{-- tombol untuk edit dan delete kendaraan --}}
                        <a href="{{ route('vehicle.vehicle_edit', $vehicle->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('vehicle.vehicle_delete', $vehicle->id) }}" class="btn btn-primary">Delete</a>
                    </td>
                </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
