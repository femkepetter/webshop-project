<nav class="navbar navbar-expand-xl navbar-light bg-white mx-auto py-4">
    <div class="container-fluid">
        <div id="logo">
            <i class="bi bi-controller hvr-grow"></i>
        </div>
        <a class="navbar-brand mx-md-2" href="/"> Games. </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                @foreach ($product_type as $ptype)
                <li class="nav-item  ms-md-3">
                    <a class="nav-link hvr-underline-reveal"
                        href="{{ route('product_type.show', $ptype->id) }}">{{ $ptype->name }}</a>
                </li>
                @endforeach

                <li class="nav-item dropdown ms-md-3">
                    <a class="nav-link dropdown-toggle hvr-underline-reveal" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Franchises
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($category as $cat)
                        <li><a class="dropdown-item" href="{{ route('category.show', $cat->id) }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <form class="d-none d-lg-flex">
                <input class="form-control d-none d-xxl-flex mx-1" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-cart mx-1" type="submit"><i class="bi bi-search hvr-grow"></i></button>
            </form>
            <button class="btn btn-cart mx-1 my-1 d-flex"><i class="bi bi-person-fill hvr-grow"></i></button>
            <a href="{{ route('cart.show') }}" class="btn btn-cart d-xxl-none mx-1 my-1"><i
                    class="bi bi-basket2-fill hvr-grow"></i></a>
            <button class="btn btn-cart d-none d-xxl-inline px-3 mx-1 text-nowrap" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                    class="bi bi-basket2-fill hvr-grow">
                    <div class="badge" id="total-products">
                        @php $total = 0 @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $itemCount = $total += $details['quantity'] @endphp
                        @endforeach
                        @endif
                        {{ $itemCount ?? '0' }}
                    </div>
                </i></button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header pt-4 ">
                    <h2 id="offcanvasRightLabel">Your cart.</h2>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <span class="badge badge-pill badge-danger" id="total-products">
                            @php $total = 0 @endphp
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            @php $itemCount = $total += $details['quantity'] @endphp
                            @endforeach
                            @endif
                            {{ $itemCount ?? '' }}
                        </span>
                    </div>

                    <table id="cart" class="table table-hover table-condensed">

                        <thead>
                            <tr>
                                <th style="width:28%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:22%" class="text-end">Subtotal</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">{{ $details['name'] }}</td>
                                <td data-th="Price">${{ $details['price'] }}</td>
                                <td data-th="Quantity" class="text-center">{{ $details['quantity'] }}x</td>
                                <td data-th="Subtotal" class="text-end">${{ $details['price'] * $details['quantity'] }}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <h3><strong>Total: ${{ $total }}</strong></h3>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart.show') }}" class="btn btn-cart">Go to cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</nav>
