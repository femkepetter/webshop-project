@extends('layouts.app')

@section('content')


<div class="row px-md-5 gx-md-5">
    <div class="col-xl-8 ">
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

    <div class="col col-xl-4">
        <h1>{{ $product->name }}.</h1>
        <h3>${{ $product->price }}</h3>
        <h3>In stock: Yes</h3>
        <p>
            {{ $product->description }}
        </p>
        <h3>
            See more by: <br>
            <a href="{{ route('category.show', $product->category) }}"
                class="mt-2 cat-title text-decoration-none hvr-grow">
                {{ $product->category->name }}</a>
        </h3>

        <a role="button" class="btn btn-cart pt-2 text-nowrap" onclick="addToCart()">
            Add to cart <i class="bi bi-bag-plus-fill hvr-grow"></i>
        </a>

    </div>
   
    <div class="card mx-auto mt-5 px-4 col-11">
        ratings:
        display name
        rating
        comment
    </div>


    <div class="card mx-auto my-5 px-4 col-11">
        <div class="input-group my-3">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="starrating" class="form-label">Rate this product:</label>
                    <select class="form-select" aria-label="Default select example" id="starrating">
                        <option value="1">1 star</option>
                        <option value="2">2 star</option>
                        <option value="3">3 star</option>
                        <option value="4">4 star</option>
                        <option value="5">5 star</option>
                    </select>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="starrating" class="form-label">We need a name:</label>
                    <input type="text" class="form-control" placeholder="Your name here" aria-label="Username"
                        id="commentname">
                </div>
            </div>
            <div class="col-12 mb-3">
                <label for="reviewcomment" class="form-label">And leave a comment:</label>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" placeholder="The best game ever!"
                        id="reviewcomment"></textarea>
                </div>
            </div>
            <div>
                <input class="btn btn-cart" type="submit" value="Submit">
            </div>
        </div>

    </div>

</div>
@endsection


@push('child-script')
<script type="text/javascript">
 $(document).ready(function() {
    $('#toast').toast('dispose')
 })

 function addToCart(){
 
        let cartButton = document.getElementById('cartButton');

        axios({
            url: "{{ route('add.to.cart') }}",
            method: "POST",
            data: {
                product_id: '{{ $product->id }}'
            }
            }).then(function (response) {
             
                if (response.data.success === true) {
                    $('#total-products').html(response.data.total_count)
                    $('#cart tbody tr').remove()
                    let cart = Object.values(response.data.cart);
                    let html = ''
                    cart.forEach(product => 
                        $('#cart tbody').append(
                            '<tr data-id="' + product.id + '"><td data-th="Product">' + product.name + '</td><td data-th="Price">$' + product.price + '</td><td data-th="Quantity" class="text-center">' + product.quantity + 'x</td><td data-th="Total" class="text-end">$' + product.price * product.quantity + '</td></tr>'
                        )
                    )
                    $('#toast').toast('show')
                } else {
                    console.log('It does not work..');
                }
            }).catch(function (response) {
                alert(response.data.message)
            })
        }
        
</script>
@endpush
