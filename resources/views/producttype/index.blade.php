@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Product type page</h1>
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($product_type as $ptype)
                        <div class="col">
                            <a href="{{ Route('producttype.show', $ptype) }}">
                                <h3>{{ $ptype->name }}</h3>
                            </a>
                            <img src="https://picsum.photos/300" alt="placeholder">
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

