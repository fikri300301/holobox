<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Galery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // $galery = Galery::all();
        // return view('index', [
        //     'categories' => $categories,
        //     'data' => $galery
        // ]);
        $categories = Category::with('galery')->get(); // Mengambil kategori beserta galeri terkait
        //dd($categories);
        return view('index', [
            'categories' => $categories,
        ]);
    }
}
