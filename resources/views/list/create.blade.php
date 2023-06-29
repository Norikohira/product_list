@extends('layouts.app')

@section('title', 'Prosucts | Index')

@section('content')  
<h2 class="text-start mt-5">PRODUCTS</h2>
  <form method="post" action="{{ route('product.store') }}">
    @csrf
    <div class="row">
      <div class="col-6">
        <label for="name">Product Name</label>
        <input type="text" name="name" id="" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-4">
        <label for="price">Price</label>
        <input type="number" name="price" id="" class="form-control">
        @error('price')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-2 mt-2">
        <button type="submit" class="btn btn-primary w-100">
          <i class="fa-solid fa-circle-plus"></i> Add
        </button>
      </div>
    </div>
  </form>

  @if($all_products->isNotEmpty())
  <table class="table table-hover mt-5">
    <thead class="bg-light">
      <tr>
        <th>ID</th>
        <th>PRODUCT NAME</th>
        <th>PRICE</th>
        <th></th>
      </tr>
    </thead>
    @foreach($all_products as $product)
    <tbody>
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{ number_format($product->price, 2, '.', '') }}</td>
        <td>
          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary mx-2">Edit</a>
          <a href="{{ route('product.destroy.confirmation', $product->id) }}" class="btn btn-danger mx-2">Delete</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  @endif
@endsection
