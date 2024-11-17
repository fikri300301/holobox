<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    public function show($id)
    {
        $data = Order::where('id', $id)->first();
        return view('dashboard.pengguna.detailorder', [
            'data' => $data
        ]);
    }

    public function show_paid($id)
    {
        $data = Order::where('id', $id)->first();
        return view('dashboard.pengguna.detailorderpaid', [
            'data' => $data
        ]);
    }
}