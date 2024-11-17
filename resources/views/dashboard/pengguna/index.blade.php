@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="container my-5">
        <h1>Riwayat Order</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($orders->isEmpty())
            <p class="text-muted">Tidak ada riwayat order.</p>
        @else
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Tanggal Reservasi</th>
                        <th>Status Transaksi</th>

                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->paket->nama_paket ?? 'Paket tidak ditemukan' }}</td>
                            <td>RP {{ number_format($order->harga, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->tanggal_reservasi)->format('d-m-Y H:i') }}</td>
                            <td>{{ ucfirst($order->transaction_status) }}</td>
                            @if ($order->transaction_status == 'pending')
                                <td>
                                    <a href="/product/{{ $order->id }}" class="btn btn-info btn-sm">Bayar</a>
                                </td>
                            @else
                                <td>
                                    <a href="/product-paid/{{ $order->id }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
