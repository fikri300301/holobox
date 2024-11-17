{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome to your dashboard</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html> --}}
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total Pelanggan</h5>
                            <h2 class="card-text">{{ $users }}</h2>
                        </div>
                        <i class="fas fa-calendar-check stats-icon"></i>
                    </div>
                    <p class="mt-5"> </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Pesanan Terbayar</h5>
                            <h2 class="card-text">{{ $orderCompletes }}</h2>
                        </div>
                        <i class="fas fa-check-circle stats-icon"></i>
                    </div>
                    <p class="mt-5"> </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Pembayaran tertunda</h5>
                            <h2 class="card-text">{{ $orderPendings }}</h2>
                        </div>
                        <i class="fas fa-credit-card stats-icon"></i>
                    </div>
                    <p class="mt-5"></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total pemasukan</h5>
                            <h2 class="card-text"> {{ $orderTotals }}</h2>
                        </div>
                        <i class="fas fa-credit-card stats-icon"></i>
                    </div>
                    <p class="mt-5"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Penyewaan yang akan datang</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($orderUpcomings as $order)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $order->paket->nama_paket }} -
                                {{ \Carbon\Carbon::parse($order->tanggal_reservasi)->format('Y-m-d') }}

                                <span
                                    class="badge bg-primary rounded-pill">{{ \Carbon\Carbon::parse($order->tanggal_reservasi)->format('H-h') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Clients</h5>
                </div>
                <div class="card-body">

                    <ul class="list-group">
                        @foreach ($recentClients as $client)
                            <li class="list-group-item">{{ $client->user->name }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
