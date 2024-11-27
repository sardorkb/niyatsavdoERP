@extends('layouts.app')
@section('title', 'Shartnoma yaratish - ' . $customer->full_name . ' ')
@section('main-content')
<div class="container">
    <h3 class="mb-4">Shartnoma Qo'shish</h3>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Agreement Form -->
    <form action="{{ route('agreements.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="customer_id">Customer</label>
            <input type="text" class="form-control" name="customer_id" value="{{ $customer->id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Agreement Duration (Months)</label>
            <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ old('product_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="product_quantity" class="form-label">Product Quantity</label>
            <input type="number" name="product_quantity" id="product_quantity" class="form-control" value="{{ old('product_quantity') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="product_cost_price" class="form-label">Product Cost Price (UZS)</label>
            <input type="number" name="product_cost_price" id="product_cost_price" class="form-control" value="{{ old('product_cost_price') }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="product_markup" class="form-label">Product Markup (%)</label>
            <input type="number" name="product_markup" id="product_markup" class="form-control" value="{{ old('product_markup') }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Agreement</button>
    </form>
</div>
@endsection