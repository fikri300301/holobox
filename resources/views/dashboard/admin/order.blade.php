@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Riawayat Order</h1>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Paket</th>
                <th>User</th>
                <th>Harga</th>
                <th>Tanggal Reservasi</th>
                <th>Status Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dat->paket->nama_paket }}</td>
                    <td>{{ $dat->user->name }}</td>
                    <td>RP {{ number_format($dat->harga, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($dat->tanggal_reservasi)->format('d-m-Y H:i') }}</td>
                    <td>{{ ucfirst($dat->transaction_status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection
