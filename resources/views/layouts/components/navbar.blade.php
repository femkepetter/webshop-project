<nav class="navbar navbar-expand-xl navbar-light bg-white mx-auto py-4">
        <div class="container-fluid">
            <div id="logo">
                <i class="bi bi-controller hvr-grow"></i>
            </div>
            <a class="navbar-brand mx-2" href="/"> Games. </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-reveal" href="#">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hvr-underline-reveal" href="#">Merch</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hvr-underline-reveal" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Franchises
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Stardew Valley</a></li>
                            <li><a class="dropdown-item" href="#">The Witcher</a></li>
                            <li><a class="dropdown-item" href="#">All Franchises</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex">
                    <input class="form-control d-none d-xxl-flex mx-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-cart mx-1" type="submit"><i class="bi bi-search hvr-grow"></i></button>
                </form>
                <button class="btn btn-cart mx-1"><i class="bi bi-person-fill hvr-grow"></i></button>
                <a href="{{ route('cart.show') }}" class="btn btn-cart d-xxl-none"><i class="bi bi-basket2-fill hvr-grow"></i></a>
                <button class="btn btn-cart d-none d-xxl-inline px-3 mx-1 text-nowrap" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"><i class="bi bi-basket2-fill hvr-grow">
                    <div class="badge" id="total-products">
                        @php $total = 0 @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $itemCount = $total += $details['quantity'] @endphp
                        @endforeach
                        @endif
                        {{ $itemCount ?? '' }}
                    </div></i></button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header pt-4 ">
                        <h5 id="offcanvasRightLabel">Cart</h5>
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
                        
                    
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $totalPrice = $details['quantity'] * $details['price'] @endphp
                            <div class="row cart-detail">
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <span id="p_id_{{ $id }}_count" class="count">{{ $details['quantity'] ?? '' }}x</span>
                                    <span id="p_id_{{ $id }}_name">{{ $details['name'] ?? '' }}</span>
                                    <span id="p_id_{{ $id }}_price" class="price text-info"> ${{ $totalPrice ?? '' }}</span> 
                                </div>
                            </div>
                        @endforeach
                        @endif

                        {{-- TOTAL --}}
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
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
    {{-- OPTIONEEL MAAR DAN MISSCHIEN BRENGT HET JE OP IDEEEN? --}}

    
