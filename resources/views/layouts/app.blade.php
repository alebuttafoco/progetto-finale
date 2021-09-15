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

    @if (Route::currentRouteName() == 'checkout.pay')
        <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{ $token }}";
            //console.log(client_token);
            // const cart = localStorage.getItem('plates');
            // const field = document.querySelector('#order_data');
            // field.value = cart;
            
            braintree.dropin.create({
                locale: 'it_IT',
                authorization: client_token,
                selector: '#bt-dropin'
            }, function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
                // localStorage.clear();
                });
            });
            });
        </script>
    @endif

    @include('components.footer')
    
    @yield('script')

</body>

</html>
