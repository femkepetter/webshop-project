@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<<<<<<< HEAD
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
=======
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
>>>>>>> main
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> main
