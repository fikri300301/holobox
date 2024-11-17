<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $order = Order::where('id', $request->input('id'))
            ->where('user_id', Auth::user()->id)
            ->where('transaction_status', 'pending')
            ->first();

        if (!$order) {
            return redirect()->route('riwayat-order')->with('error', 'Order tidak ditemukan atau sudah dibayar.');
        }

        // Set konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Siapkan parameter untuk Midtrans Snap API
        $params = [
            'transaction_details' => [
                'order_id' => 'order-' . $order->id,
                'gross_amount' => $order->harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        // Mendapatkan Snap token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan snap_token di transaksi
        $order->snap_token = $snapToken;
        $order->save();

        // Redirect ke halaman checkout dengan ID transaksi
        return redirect()->route('checkout', ['transaction' => $order->id]);
    }

    public function checkout(Order $transaction)
    {
        // Pastikan user yang login adalah pemilik order
        if (Auth::id() !== $transaction->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('dashboard.pengguna.checkout', compact('transaction'));
    }

    public function success(Order $transaction)
    {
        if ($transaction->transaction_status === 'paid') {
            return redirect()->route('riwayat-order')->with('info', 'Transaksi sudah dibayar.');
        }

        $transaction->transaction_status = 'paid';
        $transaction->save();

        return view('dashboard.pengguna.success');
    }
}
