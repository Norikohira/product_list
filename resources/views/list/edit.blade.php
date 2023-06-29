@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<h2 class="text-start mt-5">Edit Product</h2>
<form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}">
  @csrf
  @method('PATCH')
  <input type="hidden" name="_method" value="PATCH">
  <div class="row">
    <div class="col-7">
      <label for="name">Product Name</label>
      <input type="text" name="name" id="" class="form-control" value="{{ old('name', $product->name) }}">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-5">
      <label for="name">Product Price</label>
      <input type="number" name="price" id="" class="form-control" value="{{ old('price', $product->price) }}">
      @error('price')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-4">
      <button type="submit" class="btn btn-primary w-100">
        <i class="fa-solid fa-pen"></i> Save
      </button>
    </div>
  </div>
</form>
@endsection
