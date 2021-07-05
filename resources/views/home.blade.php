@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-4 col-md-12">
        <h1>We sell only the best video-games.</h1>

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
    <div class="col-lg-8 col-md-12">
        <img src="https://picsum.photos/800/600" alt="" class="img-fluid">
    </div>
</div>

<div class="text-center divider">

    <h2>What's new.</h2>
    <i class="bi bi-arrow-down-circle hvr-wobble-vertical" id="logo"></i>
</div>

@foreach ($products as $product)
@if ($loop -> iteration < 7 )
    <div class="col-md-6 col-xl-4 my-3">
        <img src="https://picsum.photos/320/250" alt="" class="img-fluid">
            <div class="row my-2">
                <div class="col-sm-8 col-lg-9  my-auto mt-2">
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

    @endif
    @endforeach



<div class="text-center divider">

    <h2>Our franchises.</h2>
    <i class="bi bi-arrow-down-circle hvr-wobble-vertical" id="logo"></i>
</div>


@foreach ($category as $cat)

            
                <div class="col-md-6 col-xl-4 my-3 text-center">
                    <a href="{{ route('category.show', $cat) }}" class="text-decoration-none hvr-grow">
                        <h3 class="cat-title">{{ $cat->name }}</h3>
                    </a>
                </div>
            
   
@endforeach


@endsection