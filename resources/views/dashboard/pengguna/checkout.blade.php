@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        <p>Order ID: {{ $transaction->id }}</p>
        <p>Total Harga: Rp{{ number_format($transaction->harga, 0, ',', '.') }}</p>
        <button id="pay-button" class="btn btn-primary">Lanjutkan Pembayaran</button>
    </div>
@endsection

@section('scripts')
    <!-- Memuat Snap.js dari Midtrans -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // Menggunakan Snap Token dari controller
            snap.pay('{{ $transaction->snap_token }}', {
                // Tentukan aksi untuk status pembayaran
                onSuccess: function(result) {
                    window.location.href =
                        "{{ route('checkout-success', ['transaction' => $transaction->id]) }}";
                },
                onPending: function(result) {
                    alert("Transaksi Anda sedang menunggu konfirmasi.");
                },
                onError: function(result) {
                    alert("Pembayaran gagal.");
                },
                onClose: function() {
                    alert("Anda menutup pembayaran tanpa menyelesaikannya.");
                }
            });
        };
    </script>
@endsection
