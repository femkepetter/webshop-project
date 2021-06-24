@extends('layouts.app')

@section('content')
<div class="row px-5 gx-5">
    <div class="col-4">
        <h1>We sell only the best videogames.</h1>

        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam blanditiis obcaecati odit
            dolorum
            iste
            porro
            sit. Atque officia, et vel reiciendis vitae facere unde, architecto, eum laboriosam quam
            officiis
            libero. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam blanditiis
            obcaecati odit
            dolorum
            iste
            porro
            sit. Atque officia, et vel reiciendis vitae facere unde, architecto, eum laboriosam quam
            officiis
            libero.
        </p>
    </div>
    <div class="col-8">
        <img src="https://picsum.photos/300" alt="" class="img-fluid">
    </div>
</div>

<div class="text-center divider">

    <h2>What's new.</h2>
    <i class="bi bi-arrow-down-circle hvr-wobble-vertical" id="logo"></i>
</div>

@foreach ($products as $product)
@if ($loop -> iteration < 7 ) <div class="col-4">
    <img src="https://picsum.photos/300" alt="" class="img-fluid">
    <div class="row my-2">
        <div class="col-9 text-end my-auto mt-2">
            <a href="{{ route('product.show', $product) }}">
                <h3>{{ $product->name }} ${{ $product->price }}</h3>
            </a>
        </div>
        <div class="col-3 text-end">
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
    @endif
    @endforeach




    <!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Homepage</h1>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col">
                        <a href="{{ route('product.show', $product) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <p>Category:
                        <a href="{{ route('category.show', $product->category) }}">
                            {{ $product->category->name }}</p></a>
                        <img src="https://picsum.photos/300" alt="placeholder">
                        <p>{{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->
    @endsection
