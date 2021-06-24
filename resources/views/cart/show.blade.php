@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">

                        <p> Current shopping cart </p>
                        @foreach($cartArray as $product)
                        <p> {{ $product->name }} </p>
                        <p> {{ $product->price }} </p>
                        @endforeach
                        <p> Your total price is €??,- </p>

                            <button class="btn btn-warning">Complete information & Pay</button>
                        </form>
                    </div>         
                </div>       
            </div>
        </div>
    </div>
@endsection