@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Category page</h1>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($category as $cat)
                    <div class="col">
                        <a href="{{ Route('category.show', $cat) }}">
                            <h3>{{ $cat->name }}</h3>
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