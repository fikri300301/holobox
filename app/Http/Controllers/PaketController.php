<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    public function index()
    {
        $data = paket::all();

        return view('dashboard.paket.paket', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('dashboard.paket.create', [
            'categories' => $category
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required|string',
            'category_id' => 'required',
            'harga_paket' => 'required|numeric',
            'durasi' => 'required|numeric',
            'foto_edit' => 'required|numeric',
            'foto_no_edit' => 'required|numeric',
            'lokasi' => 'nullable',
            'description_paket' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        //dd($validator);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // buat nama file unik berdasarkan waktu
            $image->storeAs('public/paket', $imageName); // simpan gambar ke folder storage/app/public/category
        }

        $paket = paket::create([
            'nama_paket' => $request->nama_paket,
            'category_id' => $request->category_id,
            'harga_paket' => $request->harga_paket,
            'durasi' => $request->durasi,
            'foto_edit' => $request->foto_edit,
            'foto_no_edit' => $request->foto_no_edit,
            'lokasi' => $request->lokasi,
            'description_paket' => $request->description_paket,
            'photo' => $imageName
        ]);

        return redirect()->route('paket.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $data = paket::where('id', $id)->first();
        return view('dashboard.paket.edit', [
            'data' => $data,
            'categories' => $categories
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required|string',
            'category_id' => 'required',
            'harga_paket' => 'required|numeric',
            'durasi' => 'required|numeric',
            'foto_edit' => 'required|numeric',
            'foto_no_edit' => 'required|numeric',
            'lokasi' => 'nullable',
            'description_paket' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = paket::findOrFail($id);

        // Jika ada file photo baru, simpan dan update nama file
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/paket', $imageName);

            // Update nama file di database
            $data->photo = $imageName;
        }

        $data->nama_paket = $request->nama_paket;
        $data->category_id = $request->category_id;
        $data->harga_paket = $request->harga_paket;
        $data->durasi = $request->durasi;
        $data->foto_edit = $request->foto_edit;
        $data->foto_no_edit = $request->foto_no_edit;
        $data->lokasi = $request->lokasi;
        $data->description_paket = $request->description_paket;

        $data->save();

        return redirect()->route('paket.index')->with('success', 'Paket updated successfully.');
    }


    public function destroy($id)
    {
        $data = paket::where('id', $id)->first();
        $data->delete();
        return redirect()->route('paket.index')->with('success', 'paket delete successfully.');
    }
}