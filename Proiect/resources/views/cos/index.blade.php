@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Coș de cumpărături</h1>

    @foreach($eventsInCart as $event)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $event->nume }}</h5>
    

                <div class="mb-3">
                    <label for="tip_bilet{{ $event->id }}" class="form-label" style="color: #333;">Tip Bilet:</label>
                    <select name="tip_bilet{{ $event->id }}" id="tip_bilet{{ $event->id }}" class="form-control tip-bilet" required>
                        @foreach($tipuriBilete as $tipBilet)
                            <option value="{{ $tipBilet->tip }}" data-pret-bilet="{{ $tipBilet->pret }}">{{ $tipBilet->tip }} - {{ $tipBilet->pret }} lei</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numar_bilete{{ $event->id }}" class="form-label" style="color: #333;">Număr Bilete:</label>
                    <input type="number"
                           name="numar_bilete{{ $event->id }}"
                           id="numar_bilete{{ $event->id }}"
                           class="form-control quantity-input"
                           style="border: 1px solid #ccc;"
                           min="1"
                           value="1"
                           data-event-id="{{ $event->id }}"
                           required>
                </div>

                <p class="card-text">Subtotal: <span class="subtotal" id="subtotal{{ $event->id }}">{{ $tipuriBilete[0]->pret }} lei</span></p>
            </div>
            <form action="{{ route('cos.sterge', $event) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Șterge din coș</button>
            </form>
        </div>
    @endforeach

    <div class="mb-3">
        <p class="h5">Total: <span id="total" class="badge badge-primary">0 lei</span></p>
    </div>

    <form id="payment-form" action="{{ route('cos.process.payment') }}" method="post">
        @csrf
        <div id="card-element" class="mb-3">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <input type="hidden" id="total-input" name="total-input" value="0" min="0">
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert" class="text-danger mb-3"></div>

        <button type="submit" class="btn btn-primary">Cumpără Bilete</button>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51NOGeVCp1hoguf4ztqRYU6hccgD11U5aTcKIGR9PEZJLr6FlLfOyjPTF9MndqIRIsFhbkcvKLE5PBHZlZYCAGvOf00NazGxIbq');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#333',
                fontFamily: 'Arial, sans-serif',
                fontSize: '16px',
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            // Add event listeners to all quantity input fields
            var quantityInputs = document.querySelectorAll('.quantity-input');
            quantityInputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    updateSubtotalAndTotal(input);
                });
            });

            // Add event listeners to all tip-bilet select fields
            var tipBiletSelects = document.querySelectorAll('.tip-bilet');
            tipBiletSelects.forEach(function (select) {
                select.addEventListener('change', function () {
                    updateSubtotalAndTotal();
                });
            });

            // Calculate total on page load
            updateSubtotalAndTotal();
        });

        function updateSubtotalAndTotal() {
            var total = 0;

            // Recalculate total for all events
            var allQuantityInputs = document.querySelectorAll('.quantity-input');
            allQuantityInputs.forEach(function (input) {
                var quantity = parseInt(input.value) || 1;
                var pretBilet = parseFloat(input.closest('.card').querySelector('.tip-bilet').selectedOptions[0].getAttribute('data-pret-bilet'));
                var subtotal = quantity * pretBilet;

                total += subtotal;

                // Update the subtotal for the current event
                input.closest('.card').querySelector('.subtotal').textContent = subtotal.toFixed(2) + ' lei';
            });

            // Ensure that total is at least 0
            if (total < 0) {
                total = 0;
            }

            document.getElementById('total').textContent = total.toFixed(2) + ' lei';

            // Update the hidden input value with the total
            var totalInput = document.getElementById('total-input');
            totalInput.value = total.toFixed(2);
        }

        var card = elements.create('card', { style: style });
        card.mount('#card-element');

        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Ensure that the total is at least 0 before creating a token
            updateSubtotalAndTotal(); // Recalculate total to ensure it's updated
            var total = parseFloat(document.getElementById('total').textContent.replace(' lei', ''));
            if (total < 0) {
                total = 0;
                document.getElementById('total').textContent = '0.00 lei';
            }

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token, form);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token, form) {
            // Insert the token ID into the form so it gets submitted to the server.
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form.
            form.submit();
        }
    </script>
</div>
@endsection
