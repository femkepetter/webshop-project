@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $product->name }}</h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <img src="https://picsum.photos/300" alt="placeholder">
                        <p>{{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <button class="btn btn-primary"><a href="#" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection