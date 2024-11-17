@extends('layouts.master')

@section('title', 'Add New Category')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Category</h2>

        <form action="/categories" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name Field -->
            <div class="form-group mb-3">
                <label for="name" class="form-label">Category Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" placeholder="Enter category name" required>
                </div>
                @error('name')
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
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ old('description') }}" placeholder="Enter description" required>
                </div>
                @error('description')
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
