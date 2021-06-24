@extends('layouts.app')

@section('content')


<div class="row px-5 gx-5">
    <div class="col-8">
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
    <div class="col-4">
        <h1>{{ $product->name }}.</h1>
        <h3>${{ $product->price }}</h3>
        <h3>In stock: Yes</h3>
        <p>
            {{ $product->description }}
        </p>
    </div>
</div>

<div class="text-center divider">
    <button type="button" class="btn btn-cart py-2 px-4 cart-button" id="liveToastBtn" product_id="{{ $product->id }}">
        <h2 class="hvr-grow pt-2"><i class="bi bi-bag-plus-fill "></i> Add to cart.</h2>
    </button>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Added product to cart 1
            </div>
        </div>
    </div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $product->name }}</h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <img src="https://picsum.photos/300" alt="placeholder">
                        <p>{{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <button class="cart-button" type="button" class="btn btn-success" product_id="{{ $product->id }}">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection

@push('child-script')
<script>
    $(document).ready(function () {
        $('.cart-button').on('click', function () {
            //console.log($(this).attr('product_id'));
            axios({
                url: '{{ Route("cart.store") }}',
                method: 'POST',
                data: {
                    product_id: $(this).attr('product_id'),
                }
            }).then(function (response) {
                if (response.data.success === true) {
                    console.log(response.data)
                }
            }).catch(function (response) {
                console.log(response.data.message)
            })
        })
    })
</script>
@endpush
