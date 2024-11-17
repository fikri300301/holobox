@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <div></div>
            <a href="{{ route('paket.create') }}" class="btn btn-primary">Add Paket</a>
        </div>

        <table id="userTable" class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Harga</th>
                    <th class="description-column">Description</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->harga_paket }}</td>
                        <td>{{ $item->description_paket }}</td>
                        <td>
                            @if ($item->photo)
                                <img src="{{ asset('storage/paket/' . $item->photo) }}" alt="{{ $item->nama_paket }}"
                                    width="100">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <!-- Edit and Delete actions -->
                            <a href="{{ route('paket.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('paket.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this paket?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
