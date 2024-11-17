<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        $user = auth()->user();
        if ($user->role === 'admin') {
            $jumlahUsers = User::count();
            $orderComplete = Order::where('transaction_status', 'paid')->count();
            $orderPending = Order::where('transaction_status', 'pending')->count();
            $orderUpcoming = Order::where('transaction_status', 'paid')
                ->orderBy('tanggal_reservasi', 'asc') // Mengurutkan tanggal dari yang terdekat
                ->limit(3)
                ->get();
            $recentClient = Order::where('transaction_status', 'paid')
                ->orderBy('tanggal_reservasi', 'asc') // Mengurutkan tanggal dari yang terdekat
                ->limit(3)
                ->get();
            $orderTotal = Order::where('transaction_status', 'paid')->sum('harga');
            $formattedTotal = 'Rp ' . number_format($orderTotal, 0, ',', '.');

            return view('dashboard.admin.dashboard', [
                'users' => $jumlahUsers,
                'orderCompletes' => $orderComplete,
                'orderPendings' => $orderPending,
                'orderUpcomings' => $orderUpcoming,
                'recentClients' => $recentClient,
                'orderTotals' => $formattedTotal
            ]);
        } else {
            return view('dashboard.pengguna.index', [
                'orders' => $orders
            ]);
        }
    }
}
