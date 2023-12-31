@extends('layout.app')
@section('content')
<main class="container">
    <main class="container">
        {{-- membuat order berdasarkan id dari customer --}}
        <form action="{{ route('order.order_store', ['id' => $id]) }}" method="POST" id="mainForm" enctype="multipart/form-data">
            @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <label for="searchDropdown">Search Dropdown:</label>
                    <select id="searchDropdown" class="form-control" name="selected_value" required>

                        {{-- mengambil data vehicle yang sudah ada dan menampilkannya untuk dipilih --}}
                        <option value="">Pilih Item</option>
                        @forelse ($vehicle as $vehicles)
                        <option value="{{ $vehicles->id }}">{{ $vehicles->vehicle_model }} | {{ $vehicles->vehicle_type }} | Rp.{{$vehicles->vehicle_price}}</option>
                        @empty
                        <option value="">Tidak Ada Data</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" {{ count($vehicle) > 0  ? '' : 'disabled' }}>Buat Data Customer</button>
        </form>
    </main>
</div>
@endsection
