@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Product page</h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('category.show', $category) }}">
                            <h3>{{ $category->name }}</h3>
                        </a>
                        <img src="https://picsum.photos/300" alt="placeholder">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <h3>Products under this category:</h3>
                    </div>

                <div class="col">
                    @foreach ($products as $product)
                    <ul>
                        <li>
                            <a href="{{ route('product.show', $product) }}">
                            <p>{{ $product->name }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection