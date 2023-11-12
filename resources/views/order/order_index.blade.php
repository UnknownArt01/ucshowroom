@extends('layout.app')
@section('content')
    <div class="container">
        <main class="container">
            <a href="{{ route("order.order_create", ['id'=>$customer_id]) }}" class="btn btn-primary">Create</a>
            <h1> Order </h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Kendaraan Dipesan</th>
                    <th scope="col">Harga Kendaraan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($order as $orders)
                        @if($orders->customer_id == $customer_id)
                            <tr>
                                <td>{{ $orders->customer->name }}</td>
                                <td>{{ $orders->vehicle->vehicle_model }} | {{ $orders->vehicle->vehicle_type }}</td>
                                <td>{{ $orders->vehicle->vehicle_price}}</td>
                                <td>
                                    <a href="{{ route('order.order_edit', ['id' => $orders->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('order.order_delete', ['orderId' => $orders->id]) }}" class="btn btn-primary">Delete</a>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="3">Belum Ada Data Order.</td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
              <br>
        </main>
    </div>
@endsection
