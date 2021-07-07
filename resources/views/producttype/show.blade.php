@extends('layouts.app')

@section('content')

@if ($products->count() > 0)
<div class="row px-md-5 gx-md-5">
@foreach ($products as $product)
<div class="col-12 col-md-6 col-xl-4">
        <img src="https://picsum.photos/320/250" alt="" class="img-fluid">
            <div class="row my-2">
                <div class="col-sm-8 col-lg-9 my-auto mt-2">
                    <a href="{{ route('product.show', $product) }}">
                        <h3>{{ $product->name }} ${{ $product->price }}</h3>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                    <a href="{{ route('add.to.cart', $product->id) }}" 
                        class="btn btn-cart" role="button"><i
                        class="bi bi-bag-plus-fill hvr-grow"></i></a>
                </div>
            </div>
    </div>
    @endforeach

    @else
    <p>No products here yet! </p>
    @endif
</div>
    
@endsection