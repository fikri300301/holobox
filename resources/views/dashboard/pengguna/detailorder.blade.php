@extends('layouts.master')

@section('title', 'Dashboard - Detail Order')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Kemb li</a>
            <div class="row mt-3">
                <div class="col-md-4">
                    <img src="{{ asset('storage/paket/' . $data->paket->photo) }}"
                        class="img-fluid shadow-sm border border-secondary-subtle" alt="{{ $data->paket->nama }}">
                </div>
                <div class="col-md-8">
                    <h1> {{ $data->paket->nama_paket }}</h1>
                    <p>{{ $data->paket->description_paket }}</p>
                    <p>Rp{{ number_format($data->harga, 0, ',', '.') }}</p>
                    <p>Jumlah Foto yang di edit : {{ $data->paket->foto_edit }}</p>
                    <p>Jumlah Foto yang tidak di edit : {{ $data->paket->foto_edit }}</p>
                    <p>Hari dan Tanggal Booking :
                        {{ \Carbon\Carbon::parse($data->tanggal_reservasi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                    </p>
                    <p>Jam Booking :
                        {{ \Carbon\Carbon::parse($data->tanggal_reservasi)->locale('id')->isoFormat('h H') }}
                    </p>
                    <p>Status Pembayaran : {{ $data->transaction_status }}</p>
                    <form id="checkout-form" action="{{ route('checkout-process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="product_id" value="{{ $data->paket_id }}"> <!-- Pastikan ini sesuai -->
                        <input type="hidden" name="price" value="{{ $data->harga }}">
                        <input type="hidden" name="tanggal_reservasi" value="{{ $data->tanggal_reservasi }}">
                        @auth
                            <button type="submit" class="btn btn-primary" id="pay-button">Beli Sekarang</button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login untuk membeli</a>
                        @endauth
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.getElementById('pay-button').onclick = function() {
        this.disabled = true; // Menonaktifkan tombol setelah klik pertama
        document.getElementById('checkout-form').submit();
    };
</script>

{{-- @section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // Menggunakan snap_token yang diteruskan dari controller
            snap.pay('{{ $data->snap_token }}', {
                onSuccess: function(result) {

                    window.location.href =
                        "{{ route('checkout-success', ['transaction' => $data->id]) }}";
                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection --}}
