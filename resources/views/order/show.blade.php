@extends('layouts.app')
@section('content')

<form action="{{route('order.finish')}}" method="POST">
    @csrf
<label for="delivery_adress">First Name</label>
<textarea id="first_name" class="form-control" name="first_name" placeholder="Enter first name"rows="1" required></textarea>
<label for="last_name">Last Name</label>
<textarea id="last_name" class="form-control" name="last_name" placeholder="Enter last name" rows="1" required></textarea>

<label for="delivery_adress">Delivery Adress</label>
<textarea id="delivery_adress" class="form-control" name="delivery_adress" placeholder="Enter adress" rows="2" required></textarea>

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
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
                    <td data-th="Quantity">{{ $details['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>

        <tr>
            <td colspan="5" class="text-right">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree with the terms or something
                    </label>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="5" class="text-right">
                <button class="btn btn-cart">Place Order</button>
            </form>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@push('child-script')

@endpush