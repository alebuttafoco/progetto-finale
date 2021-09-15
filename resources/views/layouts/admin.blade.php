
@include('components.head')

<body>
    <div id="app">
        <header>
            @include('components.navbar')
        </header>

        <main>
            <div class="text-center">
                @yield('titolo')
            </div>
    
            <div class="my_container dashboard">
                {{-- SIDE BAR --}}
                <nav class="sidebar">
                    <a class="{{Route::currentRouteName() == 'admin.restaurant.index' ? 'active_route' : ''}} nav-link active" aria-current="page" href="{{ route('admin.restaurant.index') }}">
                        <i class="fas fa-home fa-lg"></i>
                        <span>Home</span> 
                    </a>
    
                    @if ($restaurants->count() != 0)
    
                    <a class="{{Route::currentRouteName() == 'admin.plate.index' ? 'active_route' : ''}} nav-link" href="{{ route('admin.plate.index') }}">
                        <i class="fas fa-utensils fa-lg"></i>
                        <span>Piatti</span>
                    </a>
                    <a class="{{Route::currentRouteName() == 'admin.ordini' ? 'active_route' : ''}} nav-link" href="{{ route('admin.ordini') }}">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span>Ordini</span>
                    </a>
                    <a class="{{Route::currentRouteName() == 'admin.statistiche' ? 'active_route' : ''}} nav-link" href="{{ route('admin.statistiche') }}">
                        <i class="fas fa-chart-line fa-lg"></i>
                        <span>Dashboard</span>
                    </a>
    
                    @endif
                </nav>
    
                {{-- CONTENT --}}
                @yield('content')
            </div>
        </main>
    </div>


    <footer>        
        <div class="social">
            <i class="fab fa-facebook"></i> 
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
        </div>
        <img src="{{asset('img/logo_white.png')}}" alt="">
        <h4>Realizzato da <br> 👇 </h4>
        <div class="authors">
            <div> <a href="https://github.com/AndreiBurbulia"><i class="fab fa-github"></i> Andrei Burbulia</a> </div>
            <div> <a href="https://github.com/fdrbrs"><i class="fab fa-github"></i> Federico Borsci</a> </div>
            <div> <a href="https://github.com/alebuttafoco"><i class="fab fa-github"></i> Alessandro Buttafoco </a> </div>
            <div> <a href="https://github.com/10xMike"><i class="fab fa-github"></i> Michele Catena</a> </div>
            <div> <a href="https://github.com/peppe-p"><i class="fab fa-github"></i> Giuseppe Bumbello</a> </div>
        </div>
    </footer>
</body>

</html>
