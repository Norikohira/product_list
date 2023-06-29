@extends('layouts.app')

@section('title', 'Delete Product')

@section('content')
<h2 class="text-start">Delete Product</h2>
<p>Are you sure you want to delete "{{ $product->name }}"?</p>
<form method="POST" action="{{ route('product.destroy', ['id' => $product->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="{{ route('product.create') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
