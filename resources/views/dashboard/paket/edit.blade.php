@extends('layouts.master')

@section('title', 'Add New Category')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">edit Paket</h2>

        <form action="{{ route('paket.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Name Field -->
            <div class="form-group mb-3">
                <label for="name" class="form-label">nama paket</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket"
                        name="nama_paket" value="{{ old('nama_paket', $data->nama_paket) }}" placeholder="Enter paket name"
                        required>
                </div>
                @error('nama_paket')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Kategori Paket</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                    </div>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        <option value="" disabled>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $data->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name" class="form-label">harga paket</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="number" class="form-control @error('harga_paket') is-invalid @enderror" id="harga_paket"
                        name="harga_paket" value="{{ old('harga_paket', $data->harga_paket) }}"
                        placeholder="Enter harga paket" required>
                </div>
                @error('harga_paket')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name" class="form-label">durasi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="number" class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                        name="durasi" value="{{ old('durasi', $data->durasi) }}" placeholder="Enter durasi" required>
                </div>
                @error('durasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name" class="form-label">foto edit</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="number" class="form-control @error('foto_edit') is-invalid @enderror" id="foto_edit"
                        name="foto_edit" value="{{ old('foto_edit', $data->foto_edit) }}" placeholder="Enter foto edit"
                        required>
                </div>
                @error('foto_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name" class="form-label">foto no edit</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="number" class="form-control @error('foto_no_edit') is-invalid @enderror" id="foto_no_edit"
                        name="foto_no_edit" value="{{ old('foto_no_edit', $data->foto_no_edit) }}"
                        placeholder="Enter foto no edit" required>
                </div>
                @error('foto_no_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name" class="form-label">lokasi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                        name="lokasi" value="{{ old('lokasi', $data->lokasi) }}" placeholder="lokasi">
                </div>
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                    </div>
                    <input type="text" class="form-control @error('description_paket') is-invalid @enderror"
                        id="description_paket" name="description_paket"
                        value="{{ old('description_paket', $data->description_paket) }}" placeholder="Enter description"
                        required>
                </div>
                @error('description_paket')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo Field -->
            <div class="form-group mb-4">
                <label for="photo" class="form-label">Photo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                    </div>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                        name="photo" accept="image/*">
                </div>
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if ($data->photo)
                <div class="form-group mb-4">
                    <label for="current-photo" class="form-label">Current Photo</label>
                    <div>
                        <img src="{{ asset('storage/paket/' . $data->photo) }}" alt="paket Photo" class="img-thumbnail"
                            width="150">
                    </div>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="form-group mb-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('paket.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
        {{-- <a href="{{ route('paket.index') }}"><button type="submit" class="btn btn-danger">Kembali</button></a> --}}
    </div>
@endsection
