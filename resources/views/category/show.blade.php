@extends('layouts.app')

@section('content')

@if ($products->count() > 0)
<div class="row px-5 gx-5">
@foreach ($products as $product)
<div class="col-md-6 col-xl-4">
        <img src="https://picsum.photos/320/250" alt="" class="img-fluid">
            <div class="row my-2">
                <div class="col-sm-8 col-lg-9  my-auto mt-2">
                    <a href="{{ route('product.show', $product) }}">
                        <h3>{{ $product->name }} ${{ $product->price }}</h3>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                    <button type="button" class="btn btn-cart " id="${{ $product->id }}"><i
                            class="bi bi-bag-plus-fill hvr-grow"></i></button>

                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Bootstrap</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Added product to cart
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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