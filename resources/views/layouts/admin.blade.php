
@include('components.head')

<body>
    <div id="app">
        <header>
            @include('components.navbar')
        </header>


        <div class="container dashboard">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('admin.restaurant.index') }}">
                                    <i class="fas fa-home fa-lg"></i>
                                    Home
                                </a>
                            </li>



                            @if ($restaurants->count() != 0)


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.plate.index') }}">
                                        <i class="fas fa-utensils fa-lg"></i>
                                        Piatti
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.ordini') }}">
                                        <i class="fas fa-shopping-cart fa-lg"></i>
                                        Ordini
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.statistiche') }}">
                                        <i class="fas fa-chart-line fa-lg"></i>
                                        Dashboard
                                    </a>
                                </li>

                            @endif


                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        @yield('titolo')
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
