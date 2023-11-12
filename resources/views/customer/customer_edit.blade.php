@extends('layout.app')
@section('content')
    <div class="container">
        <main class="container">
            {{-- tombol kembali kembali --}}
            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
            <h1> Buat Data Customer Baru </h1>

            {{-- untuk menampilkan semua data yang bisa di edit berdasarkan id --}}
            <div class="container">
                <form action="{{ route('customer.customer_update', ['id' => $customer->id]) }}" method="POST" id="mainForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control" type="text" placeholder="Nama" aria-label="name" name="name" value="{{$customer->name}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input class="form-control" type="text" placeholder="Alamat" aria-label="address" name="address" value="{{$customer->address}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input class="form-control" type="number" placeholder="Nomor Telepon" aria-label="phone" name="phone" value="{{$customer->phone}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="id_card" class="form-label">Nomor KTP</label>
                        <input class="form-control" type="number" placeholder="Nomor KTP" aria-label="id_card" name="id_card" value="{{$customer->id_card}}" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Data Customer</button>
                </form>
            </div>
        </main>
    </div>
@endsection
