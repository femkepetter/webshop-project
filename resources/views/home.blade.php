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

<div class="row display-align">
@foreach ($products as $item)
@if ($item->id < 7)
    <div class="col-md-6 col-xl-4 my-3">
    <img src="https://picsum.photos/320/250" alt="" class="img-fluid">
            <div class="row my-2">
                <div class="col-sm-8 col-lg-8 mt-2">
                    <a href="{{ route('product.show', $item) }}">
                        <h3>{{ $item->name }} ${{ $item->price }}</h3>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-4">
                        <a role="button" data-id="{{ $item->id }}" id="homeCartButton" class="btn btn-cart add-to-cart">
                            <i class="bi bi-bag-plus-fill hvr-grow"></i>
                        </a>
                    </div>
            </div>
                    
    </div>

    @endif
    @endforeach
</div>

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

@push('child-script')
<script type="text/javascript">
  $(document).ready(function() {
    $('#toast').toast('dispose')
 })
 

 $(document).ready(function() {
    $(document).on("click",".add-to-cart",function() {
       
        let product_id = $(this).data('id');
        axios({
            url: '{{ route('add.to.cart') }}',
            method: "POST",
            data: {
                product_id: product_id
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
        })
 });
        
</script>
@endpush
