@extends('layout')

@section('content')
<h2 class="mb-4">Add New Laptop</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('laptops.store') }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control" placeholder="Dell, HP, Lenovo..." required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Model</label>
        <input type="text" name="model" class="form-control" placeholder="Inspiron, Pavilion..." required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Serial Number</label>
        <input type="text" name="serial_number" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" value="1" min="1" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Rental Price ($)</label>
        <input type="number" step="0.01" name="rental_price" class="form-control" required>
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control" placeholder="Optional"></textarea>
    </div>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-secondary btn-sm me-1">Save Laptop</button>
        <a href="{{ route('laptops.index') }}" class="btn btn-secondary btn-sm me-1">Back to List</a>
    </div>
</form>
@endsection
