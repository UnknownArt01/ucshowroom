@extends('layout.app')
@section('content')
    <div class="conteiner">
        <main class="container">
            <a href="{{ url()->previous() }}">Kembali</a>
            <form action="{{ route('order.order_update', ['id' => $order->id]) }}" method="POST" id="mainForm" enctype="multipart/form-data">
                @csrf
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <label for="searchDropdown">Search Dropdown:</label>
                        <select id="searchDropdown" class="form-control" name="selected_value" required>
                            <option value="">Pilih Item</option>
                            @forelse ($vehicle as $vehicles)
                            <option value="{{ $vehicles->id }}" {{ $vehicles->id == $order->vehicle_id ? 'selected' : "" }} >{{ $vehicles->vehicle_model }} | {{ $vehicles->vehicle_type }} | Rp.{{$vehicles->vehicle_price}}</option>
                            @empty
                            <option value="">Tidak Ada Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Buat Data Customer</button>
            </form>
        </main>
    </div>
@endsection
