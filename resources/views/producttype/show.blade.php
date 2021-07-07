@extends('layouts.app')

@section('content')

@if ($products->count() > 0)
<div class="row px-md-5 gx-md-5">
@foreach ($products as $product)
<div class="col-12 col-md-6 col-xl-4">
        <img src="https://picsum.photos/320/250" alt="" class="img-fluid">
            <div class="row my-2">
                <div class="col-sm-8 col-lg-9 my-auto mt-2">
                    <a href="{{ route('product.show', $product) }}">
                        <h3>{{ $product->name }} ${{ $product->price }}</h3>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                    <a role="button" data-id="{{ $product->id }}" id="homeCartButton" class="btn btn-cart add-to-cart">
                        <i class="bi bi-bag-plus-fill hvr-grow"></i>
                    </a>
                </div>
            </div>
    </div>
    @endforeach

    @else
    <p>No products here yet! </p>
    @endif
</div>
    
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