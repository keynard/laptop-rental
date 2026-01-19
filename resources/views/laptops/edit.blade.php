@extends('layout')

@section('content')
<h2 class="mb-4">Edit Laptop</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('laptops.update', $laptop->id) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label class="form-label">Brand</label>
        <input type="text" name="brand" value="{{ $laptop->brand }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Model</label>
        <input type="text" name="model" value="{{ $laptop->model }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Serial Number</label>
        <input type="text" name="serial_number" value="{{ $laptop->serial_number }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" value="{{ $laptop->stock }}" class="form-control" min="1" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Rental Price ($)</label>
        <input type="number" step="0.01" name="rental_price" value="{{ $laptop->rental_price }}" class="form-control" required>
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ $laptop->description }}</textarea>
    </div>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-secondary btn-sm me-1r">Update Laptop</button>
        <a href="{{ route('laptops.index') }}" class="btn btn-secondary btn-sm me-1">Back to List</a>
    </div>
</form>
@endsection
