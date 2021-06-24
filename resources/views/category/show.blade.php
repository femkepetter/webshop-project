@extends('layouts.app')

@section('content')

@if ($products->count() > 0)
<div class="row px-5 gx-5">
@foreach ($products as $product)
    <div class="col-lg-4">
        <img src="https://picsum.photos/300" alt="placeholder">
            <a href="{{ route('product.show', $product) }}">
                <p>{{ $product->name }}</p>
            </a>
    </div>
    @endforeach

    @else
    <p>No products here yet!</p>
    @endif
</div>
    


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>All {{ $category->name }} products </h1>
            <div class="container-fluid">

                <div class="col">
                    @foreach ($products as $product)

                        <img src="https://picsum.photos/300" alt="placeholder">
                            <a href="{{ route('product.show', $product) }}">
                            <p>{{ $product->name }}</p>
                            </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> -->
@endsection