<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\paket;
use Illuminate\Http\Request;

class CategoryPaketController extends Controller
{
    public function index($id)
    {
        $data = paket::where('category_id', $id)->get();
        $category = Category::where('id', $id)->first();

        //dd($data);
        return view('categorypaket', [
            'categories' => $category,
            'data' => $data

        ]);
    }

    public function detail($id)
    {
        $data = paket::where('id', $id)->first();
        return view('detailpaket', [
            'data' => $data
        ]);
    }
}