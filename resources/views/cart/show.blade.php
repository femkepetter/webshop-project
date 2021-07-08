@extends('layouts.app')
@section('content')
<h1 class="text-center mb-5">Your cart.</h1>
<div class="table-responsive">
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr class>
            <th style="width:28% ">Product</th>
            <th style="width:10% ">Price</th>
            <th style="width:6% ">Quantity</th>
            <th style="width:10% ">Delete</th>
            <th style="width:22% " class="text-end">Subtotal</th>
 
        </tr>
    </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td class="actions">
                            <button class="btn btn-cart btn-sm remove-from-cart"><i class="bi bi-x"></i></button>
                        </td>
                        <td data-th="Subtotal" class="text-end">${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-end"><h3><strong>Subtotal: ${{ $total }}</strong></h3></td>
            </tr>
        </tfoot>
</table>
</div>

<div class="text-center">
                <a href="{{ url('/') }}" class="btn btn-cart my-1 text-nowrap"> Continue Shopping</a>
                <button onclick="window.location='{{ url("/checkout") }}'" class="btn btn-cart">Checkout</button>
            <div>
@endsection

@push('child-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#toast').toast('dispose')
    })

    $(document).ready(function(){
    //get it if Status key found
    if(localStorage.getItem("Status"))
    {
        $('#toast').toast('show')
        localStorage.clear();
    }
    
    });



    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        let that = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: that.parents("tr").attr("data-id"), 
                quantity: that.parents("tr").find(".quantity").val()
            }
            }).then(function (response) {
                if (response.data.success === true) {
            success: function (response) {
                localStorage.setItem("Status",response.data.success)
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        let that = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: that.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endpush