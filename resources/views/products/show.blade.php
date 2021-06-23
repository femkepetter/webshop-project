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
                        <button class="cart-button" type="button" class="btn btn-success" product_id="{{ $product->id }}">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('child-script')
<script>
    $(document).ready(function() {
        $('.cart-button').on('click', function() {
            //console.log($(this).attr('product_id'));

            axios({
                url: '{{ Route("cart.store") }}',
                method: 'POST',
                data: {
                    product_id: $(this).attr('product_id'),
                }
            }).then(function(response) {
                if (response.data.success === true) {
                    console.log(response.data)
                }
            }).catch(function(response) {
                console.log(response.data.message)
            })
        })
    })
</script>
@endpush
