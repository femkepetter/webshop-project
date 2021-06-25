<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- ANIMATIONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;0,700;0,800;0,900;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JAVASCRIPT -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div id="app">


        <main class="container-fluid">
            @include('layouts.components.navbar')
            <section class="glass justify-content-center mx-auto shadow px-5 py-4">


                <div class="row px-5 gx-5 mb-5">

                    @yield('content')

                </div>


                <div class="row mx-auto mt-5">
                    <div class="col-12 d-flex justify-content-center mt-5 ">
                        <h2>
                            <i class="socialmedia bi bi-facebook"></i>
                            <i class="socialmedia bi bi-instagram"></i>
                            <i class="socialmedia bi bi-linkedin"></i>
                            <i class="socialmedia bi bi-twitter"></i>
                        </h2>
                    </div>
                    <div class="col d-flex justify-content-center copyright"> ©Copyright Femke & Nina productions
                    </div>

                </div>

            </section>
        </main>

        <!-- <div class="container-fluid">

            @include('layouts.components.navbar')

            <main class="py-4">
                @yield('content')
            </main>
        </div> -->

    </div>
    <!-- Scripts -->

    @stack('child-script')

    <div class="overflow-hidden">
        <div class="circle-1"></div>
        <div class="circle-2"></div>
        <div class="circle-3"></div>
        <div class="circle-4"></div>
    </div>


    <script>            
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: false
        })

    </script>

    

</html>
</body>

</html>
