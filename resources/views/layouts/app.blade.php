@include('components.head')

<body>
    <div id="app">
        <header>
            @include('components.navbar')
        </header>

        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        @yield('script')
    </footer>
</body>

</html>
