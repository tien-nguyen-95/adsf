{{-- @include('partials.head')
<body>
    @include('partials.nav')
    <div id="wrapper">

        @include('partials.sidebar')

        @yield('content')

    @include('partials.foot')
</body>
</html> --}}


@include('partials.admin.header')

@include('partials.admin.sidebar')

@include('partials.admin.navbar')

@yield('content')


@include('partials.admin.footer')

</body>

</html>
