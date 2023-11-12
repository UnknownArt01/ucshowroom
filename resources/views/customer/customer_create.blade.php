@extends('layout.app')
@section('content')
<div class="container">
    <h2 class="mt-4">Create Customer</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
{{-- formulir untuk membuat customer--}}
    <form action="{{ route('customer.customer_store') }}" method="POST" class="mt-3">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error("name")
                <small>{{$massage}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
            @error("address")
                <small>{{$massage}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
            @error("phone")
                <small>{{$massage}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_card">ID Card (NIK):</label>
            <input type="number" class="form-control" id="id_card" name="id_card" required>
            @error("id_card")
                <small>{{$massage}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success submit-form" style="background:green" id="create_new">Create Customer</button>
    </form>
</div>
@endsection
