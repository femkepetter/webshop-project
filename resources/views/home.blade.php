@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Homepage</h1>
            <div>
                @foreach ($products as $product)
                <p>{{ $product->category->name }}</p>
                <p>{{ $product->name }}</p>
                <p>{{ $product->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection