@extends('layouts.app')

@section('content')
    <form method="post" id="payment-form" action="{{ url('/pay') }}">
        @csrf
        @method('POST')

        <div id="dropin-container"></div>
        <input type="submit" />
        <input type="hidden" value="{{ $clientToken }}">
        <input type="hidden" id="nonce" name="payment_method_nonce" />
    </form>

@endsection

@section('script')
    {{-- <footer>
        <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>

        <script type="application/javascript">
            //var token = @json($clientToken);
            var form = document.getElementById('payment-form');
            var token = "{{ $clientToken }}";

            braintree.dropin.create({
                authorization: token,
                container: '#dropin-container'
            }, (error, dropinInstance) => {
                if (error) console.error(error);

                form.addEventListener('submit', event => {
                    event.preventDefault();

                    dropinInstance.requestPaymentMethod((error, payload) => {
                        if (error) console.error(error);

                        document.getElementById('nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
        </script>
    </footer> --}}
@endsection
