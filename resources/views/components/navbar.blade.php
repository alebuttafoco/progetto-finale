        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <div class="container d-flex flex-wrap align-items-center justify-content-around">

                <a id="logo" class="d-flex align-items-center mb-md-0 text-decoration-none" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo_secondary.png') }}" alt="Logo DeliveBoo">
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="link">I nostri ristoranti</a></li>
                    <li><a href="#" class="link">Riders</a></li>
                    <li><a href="#" class="link">FAQs</a></li>
                    <li><a href="#" class="link">Contattaci</a></li>
                </ul>

                <div class="btn_div d-flex justify-content-end">
                    @guest
                        <a class="nav-link bttn" href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a class="nav-link bttn" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        @endif
                    @else
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user') }}">{{ __('Profilo') }}</a>

                                <a class="dropdown-item bttn" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
