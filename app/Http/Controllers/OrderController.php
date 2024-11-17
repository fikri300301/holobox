<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();

        return view('dashboard.pengguna.index', compact('orders'));
    }

    public function all()
    {
        $order = Order::all();
        return view('dashboard.admin.order', [
            'data' => $order
        ]);
    }

    public function getOrder($id)
    {
        $data = paket::where('id', $id)->first();
        return view('order', [
            'data' => $data
        ]);
    }

    public function store(Request $request, $id)
    {
        // dd($request);
        // Validasi data input
        $request->validate([
            'tanggal_reservasi' => 'required|date',
        ]);

        // Ambil data paket yang dipilih berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Buat order baru
        $order = new Order();
        $order->paket_id = $paket->id;
        $order->user_id = auth()->id(); // Pastikan user sudah login
        $order->harga = $paket->harga_paket;
        $order->tanggal_reservasi = $request->input('tanggal_reservasi');
        $order->transaction_status = 'pending';

        // Simpan order ke database
        $order->save();

        return to_route('riwayat-order')->with('success', 'Booking berhasil dilakukan!');
        // Redirect atau tampilkan pesan sukses
        // return redirect()->back()->with('success', 'Booking berhasil dilakukan!');

    }
}