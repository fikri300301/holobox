@extends('layouts.master')

@section('title', 'Add New Category')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h2 class="mb-4">Add New Paket</h2>

        <form action="/galery" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Kategori Paket</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                    </div>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
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
                        name="photo" accept="image/*" required>
                </div>
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
