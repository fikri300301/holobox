@extends('layouts.master')

@section('title', 'Dashboard - Detail Order')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">Kembali</a>
            <div class="card shadow-sm">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4 text-center">
                        <!-- Centering the image vertically within the card -->
                        <img src="{{ asset('storage/paket/' . $data->paket->photo) }}" class="img-fluid rounded"
                            alt="{{ $data->paket->nama }}" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title text-primary">{{ $data->paket->nama_paket }}</h1>
                            <p class="card-text text-muted">{{ $data->paket->description_paket }}</p>
                            <h3 class="text-success">Rp{{ number_format($data->harga, 0, ',', '.') }}</h3>
                            <p><strong>Jumlah Foto yang di edit:</strong> {{ $data->paket->foto_edit }}</p>
                            <p><strong>Jumlah Foto yang tidak di edit:</strong> {{ $data->paket->foto_no_edit }}</p>
                            <p><strong>Hari dan Tanggal Booking:</strong>
                                {{ \Carbon\Carbon::parse($data->tanggal_reservasi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                            </p>
                            <p><strong>Status Pembayaran:</strong>
                                <span class="badge bg-success text-uppercase">{{ $data->transaction_status }}</span>
                            </p>
                        </div>
                    </div>
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

{{-- Uncomment and add Midtrans if required --}}
{{-- @section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $data->snap_token }}', {
                onSuccess: function(result) {
                    window.location.href = "{{ route('checkout-success', ['transaction' => $data->id]) }}";
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
