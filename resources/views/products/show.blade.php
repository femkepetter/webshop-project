@extends('layouts.app')

@section('content')


<div class="row px-5 gx-5">
    <div class="col-xl-8">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-xl-4">
        <h1>{{ $product->name }}.</h1>
        <h3>${{ $product->price }}</h3>
        <h3>In stock: Yes</h3>
        <p>
            {{ $product->description }}
        </p>
        <h3>
            <p>See more by: <a href="{{ route('category.show', $product->category) }}">
                    {{ $product->category->name }}</a></p>
        </h3>

        <div class="text-center divider">
            <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}"
                    class="btn btn-cart btn-block text-center" role="button">Add to cart</a> </p>
        </div>



    </div>
</div>
@endsection


@push('child-script')
<script>
    function addToCart() {
        let product = {
            !!json_encode($product) !!
        };
        let cartButton = document.getElementById('liveToastBtn');
        axios({
            url: cartButton.getAttribute('route'),
            method: 'PUT',
            data: {
                product: product
            }
        }).then(function (response) {
            if (response.data.succes === true) {
                console.log('yay!');
            } else {
                console.log('this doesnt work');
            }
        }).catch(function (response) {
            alert(response.data.message)
        })
    }

</script>
@endpush
