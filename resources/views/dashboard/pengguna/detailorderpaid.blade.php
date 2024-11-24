@extends('layouts.master')

@section('title', 'Dashboard - Detail Order')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">Kembali</a>
            <button id="print-button" class="btn btn-secondary mb-3">Cetak Laporan</button>

            <!-- Area yang ingin dicetak -->
            <div id="printable-area" style="padding: 20px; background-color: white; border-radius: 10px;">
                <div class="card shadow-sm">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('storage/paket/' . $data->paket->photo) }}" class="img-fluid rounded"
                                alt="{{ $data->paket->nama }}" style="max-width: 100%; height: auto; border-radius: 10px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title text-primary">{{ $data->paket->nama_paket }}</h1>
                                <p class="card-text">nama customer : {{ $data->user->name }}</p>
                                <p class="card-text text-muted">{{ $data->paket->description_paket }}</p>
                                <h3 class="text-success">Rp{{ number_format($data->harga, 0, ',', '.') }}</h3>
                                <p><strong>Jumlah Foto yang di edit:</strong> {{ $data->paket->foto_edit }}</p>
                                <p><strong>Jumlah Foto yang tidak di edit:</strong> {{ $data->paket->foto_no_edit }}</p>
                                <p><strong>Hari dan Tanggal Booking:</strong>
                                    {{ \Carbon\Carbon::parse($data->tanggal_reservasi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </p>
                                <p><strong>JAM:</strong>
                                    {{ \Carbon\Carbon::parse($data->tanggal_reservasi)->locale('id')->isoFormat('HH:mm') }}
                                </p>
                                <p><strong>Status Pembayaran:</strong>
                                    <span class="badge bg-success text-uppercase">{{ $data->transaction_status }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Area cetak berakhir -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const printButton = document.getElementById('print-button');
            if (printButton) {
                printButton.onclick = function() {
                    const printContents = document.getElementById('printable-area').outerHTML;
                    const printWindow = window.open('', '_blank', 'width=800,height=600');
                    printWindow.document.open();
                    printWindow.document.write(`
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <title>Print</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    padding: 20px;
                                    background-color: white;
                                }
                                .card {
                                    margin: auto;
                                    border-radius: 10px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                }
                                #printable-area::before {
                                    content: 'HOLOBOX';
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 100px;
                                    color: rgba(0, 0, 0, 0.1); /* Transparansi */
                                    z-index: -1;
                                    white-space: nowrap;
                                }
                                img {
                                    display: none !important; /* Sembunyikan gambar saat mencetak */
                                }
                                .card-body {
                                    padding: 20px;
                                }
                                h1, h3, p {
                                    text-align: left;
                                }
                            </style>
                        </head>
                        <body>
                            ${printContents}
                        </body>
                        </html>
                    `);
                    printWindow.document.close();
                    printWindow.print();
                };
            }
        });
    </script>
@endsection

<style>
    @media print {
        body * {
            display: none !important;
        }

        #printable-area {
            display: block !important;
            margin: auto;
            width: 80%;
            position: relative;
        }

        #printable-area::before {
            content: 'HOLOBOX';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 100px;
            color: rgba(0, 0, 0, 0.1);
            z-index: -1;
            white-space: nowrap;
        }

        #printable-area img {
            display: none !important;
            /* Sembunyikan gambar saat mencetak */
        }

        #printable-area .card-body {
            padding: 20px;
        }

        #printable-area h1,
        #printable-area h3,
        #printable-area p {
            text-align: left;
        }
    }
</style>
