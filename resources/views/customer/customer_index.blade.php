@extends('layout.app')
@section('content')
    <div>
        {{-- button untuk membuat customer baru --}}
        <a href="{{ route('customer.customer_create') }}" class="btn btn-primary mt-3">Create New Customer</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>NIK</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- untuk menampilkan data customer beserta tombol yang digunakan untuk masuk ke order list berdasarkan customer, button edit dan button delete --}}
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->id_card }}</td>
                    <td>
                        {{-- untuk masuk kehalaman index dari order --}}
                        <a href="{{ route('order.order_index', $customer->id) }}" class="btn btn-primary mt-3">Order List</a>
                        {{--  digunakan untuk edit data customer--}}
                        <a href="{{ route('customer.customer_edit', $customer->id) }}" class="btn btn-primary mt-3">Edit</a>
                        {{-- digunakan untuk delete --}}
                        <a href="{{ route('customer.customer_delete', $customer->id) }}" class="btn btn-primary mt-3">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No vehicles found.</td>
                </tr>
            @endforelse
            </tbody>
    </div>
@endsection
