@include('layouts.components.header')

<div id="app">

    @include('layouts.components.navbar')

    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('child-script')

@include('layouts.components.footer')