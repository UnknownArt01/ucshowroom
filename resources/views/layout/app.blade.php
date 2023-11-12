{{-- file yang diggunakan untuk template sehingga semua hanya perlu menulis ulang tampilan body --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Layout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Your App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">    <a href="/" class="btn btn-primary mt-3">Create New Customer</a>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicle.vehicle_index') }}">Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.customer_index') }}">Customers</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.order_index', ['id']) }}">Orders</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Content of your page goes here -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script>
        // Kontrol tampilan kolom-kolom berdasarkan tipe kendaraan
        document.getElementById('vehicle_type').addEventListener('change', function () {
            var selectedType = this.value;

            // Semua kolom direset
            document.getElementById('passengerAmountGroup').style.display = 'none';
            document.getElementById('trunkSpaceGroup').style.display = 'none';
            document.getElementById('tireAmountGroup').style.display = 'none';
            document.getElementById('CargoSpaceGroup').style.display = 'none';
            document.getElementById('baggageSpaceGroup').style.display = 'none';

            // Tampilkan kolom berdasarkan tipe kendaraan

            if (selectedType === 'Mobil' || selectedType === 'Truck') {
                document.getElementById('passengerAmountGroup').style.display = 'block';
            }

            if (selectedType === 'Mobil') {
                document.getElementById('trunkSpaceGroup').style.display = 'block';
            }

            if (selectedType === 'Truck') {
                document.getElementById('tireAmountGroup').style.display = 'block';
                document.getElementById('CargoSpaceGroup').style.display = 'block';
            }

            if (selectedType === 'Motor') {
                document.getElementById('baggageSpaceGroup').style.display = 'block';
            }

        });

    </script>
</body>
</html>
