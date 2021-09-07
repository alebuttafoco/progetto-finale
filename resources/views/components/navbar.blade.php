<div class="navbar">
    <a id="logo" href="{{ url('/') }}">
        <img src="{{ asset('img/logo_secondary.png') }}" alt="Logo DeliveBoo">
    </a>

    {{-- INSERISCI LINK NELLA NAV --}}
    {{-- <ul class="center_nav nav">
        <li><a href="#" class="link"></a></li>
    </ul> --}}
    <div class="right_nav">
        @guest
            <a class="nav-link bttn" href="{{ route('login') }}">{{ __('Login') }}</a>

            @if (Route::has('register'))
                <a class="nav-link bttn" href="{{ route('register') }}">{{ __('Registrati') }}</a>
            @endif
        @else
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu p-0 " aria-labelledby="navbarDropdown">
                    <a class="bttn_reverse dropdown-item"
                        href="{{ route('admin.restaurant.index') }}">{{ __('Profilo') }}</a>

                    <a class="bttn_reverse dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        @endguest
    </div>
</div>
