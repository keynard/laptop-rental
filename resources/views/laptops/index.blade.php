@extends('layout')

@section('content')
<h1 class="mb-4">
    <i class="bi bi-laptop-fill me-2"></i> Laptop Rental
</h1>

<a href="{{ route('laptops.create') }}" class="btn btn-secondary mb-3">Add Laptop</a>

<table class="table table-dark table-striped table-hover table-bordered align-middle table-fade">
    <thead class="table-primary text-dark">
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Serial Number</th>
            <th>Stock</th>
            <th>Rental Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($laptops as $laptop)
    <tr>
        <td>{{ $laptop->brand }}</td>
        <td>{{ $laptop->model }}</td>
        <td>{{ $laptop->serial_number }}</td>
        <td>{{ $laptop->stock }}</td>
        <td>${{ $laptop->rental_price }}</td>
        <td>{{ $laptop->description }}</td>
        <td>
            <!-- Edit button -->
            <a href="{{ route('laptops.edit', $laptop->id) }}" class="btn btn-secondary btn-sm me-1">Edit</a>

            <!-- Delete button -->
            <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary btn-sm me-1" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

           <!-- Rent button -->
<form action="{{ route('laptops.rent', $laptop->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-light btn-sm me-1" 
            @if($laptop->stock == 0) disabled @endif>
        @if($laptop->stock == 0) Out of Stock @else Rent @endif
    </button>
</form>

<!-- Return button -->
<form action="{{ route('laptops.return', $laptop->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-light btn-sm me-1"
            @if($laptop->stock >= $laptop->max_stock) disabled @endif>
        Return
    </button>
</form>


        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7" class="text-center">No laptops available</td>
    </tr>
    @endforelse
</tbody>

</table>
@endsection
