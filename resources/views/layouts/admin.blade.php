
@include('components.head')

<body>
    <div id="app">
        <header>
            @include('components.navbar')
        </header>


        <div class="text-center">
            @yield('titolo')
        </div>

        <div class="my_container dashboard">
            {{-- SIDE BAR --}}
            <nav class="sidebar">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.restaurant.index') }}">
                    <i class="fas fa-home fa-lg"></i>
                    <span>Home</span> 
                </a>

                @if ($restaurants->count() != 0)

                <a class="nav-link" href="{{ route('admin.plate.index') }}">
                    <i class="fas fa-utensils fa-lg"></i>
                    <span>Piatti</span>
                </a>
                <a class="nav-link" href="{{ route('admin.ordini') }}">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span>Ordini</span>
                </a>
                <a class="nav-link" href="{{ route('admin.statistiche') }}">
                    <i class="fas fa-chart-line fa-lg"></i>
                    <span>Dashboard</span>
                </a>

                @endif
            </nav>

            {{-- CONTENT --}}
            @yield('content')
        </div>

    </div>
</body>

</html>
