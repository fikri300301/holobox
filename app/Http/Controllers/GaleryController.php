<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    public function index()
    {
        $data = Galery::all();
        return view('dashboard.galery.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('dashboard.galery.create', [
            'categories' => $category
        ]);
    }

    public function store(Request $request)
    {
        //dd($request);

        $validator = Validator::make(
            $request->all(),
            [
                'category_id' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // buat nama file unik berdasarkan waktu
            $image->storeAs('public/galery', $imageName); // simpan gambar ke folder storage/app/public/category
        }

        $galery = Galery::create([
            'category_id' => $request->category_id,
            'photo' => $imageName
        ]);

        return to_route('galery.index')->with('success', 'Photo berhasil dilakukan!');
    }

    public function destroy($id)
    {

        $data = Galery::where('id', $id)->first();
        $data->delete();
        return redirect()->route('galery.index')->with('success', 'foto berhasil dihapus');
    }

    public function galeriCategory($id)
    {
        //$data = Galery::all();
        $data = Galery::where('category_id', $id)->get();
        //  dd($data);
        return view('galery', [
            'data' => $data
        ]);
    }
}