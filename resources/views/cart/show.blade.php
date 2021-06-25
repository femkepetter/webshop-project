@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">

                        <?php $totalPrice = 0; $index = 0; ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td id="amount{{$index}}">Quantity</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        @if( $cartArray !== null )
                            @foreach( $cartArray as $product)
                            <tbody>
                                    <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td><button id="sub{{$index}}" class="btn btn-secondary btn-sm" onclick="subOne({{$index}})" route="{{route('cart.sub', $index)}}"> - 1</button>
                                        {{$product->quantity}}
                                        <button id="add{{$index}}" class="btn btn-secondary btn-sm" onclick="addOne({{$index}})" route="{{route('cart.add', $index)}}"> + 1 </button>
                                        </td>
                                    
                                <form id="delete-frm" action="{{route('cart.delete', $index)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </form>
                                <?php $totalPrice += ($product->price * $product->quantity); ?>
                            <?php $index++; ?>
                            @endforeach
                            @endif
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td>€<?= $totalPrice; ?>,-</td>
                                </tr>
                        </tbody>
                    </table> 
                            @if ( $cartArray == null )
                            <p>Your cart is empty!</p>
                            @endif
                    </div>         
                </div>       
            </div>
        </div>
    </div>
@endsection