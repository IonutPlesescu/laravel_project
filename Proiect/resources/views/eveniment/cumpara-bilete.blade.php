<!-- resources/views/eveniment/cumpara-bilete.blade.php -->
@extends('layouts.app')

@section('content')
    <div>
    <h1 class="mb-4" style="font-size: 25px; text-align:center;">Cumpărare Bilete pentru evenimentul {{ $event->nume }}</h1>
    <h3 class="mb-4" style="font-size: 18px; color: white; text-align:center;">Pret bilet {{ $event->pret }} lei / bilet</h3>
        <!-- Adaugă aici formularul sau alte elemente necesare pentru cumpărarea de bilete -->
        <form action="{{ route('evenimente.cumpara-bilete', $event->id) }}" method="post" id="payment-form">
            @csrf
            <!-- Adaugă câmpuri pentru detaliile cumpărării -->
            <div class="mb-3">
            <label for="email" class="form-label" style="color: #333; color: white;margin: 10px;">Email:</label>
            <input type="text" name="email" id="email" class="form-control" style="border: 1px solid #ccc;" value="{{ Auth::user()->email }}" required readonly>

    </div>

    <div class="mb-3">
        <label for="numar_bilete" class="form-label" style="color: #333; color: white; margin: 10px;">Număr Bilete:</label>
        <input type="number" name="numar_bilete" id="numar_bilete" class="form-control" style="border: 1px solid #ccc; margin: 10px;" required>
    </div>


            <!-- Alte câmpuri și opțiuni pot fi adăugate în funcție de nevoi -->

            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert" style="color: #ff0000; font-size: 14px; margin: 10px;"></div>

            <div class="mb-3">
                <label for="suma_totala" class="form-label" style="color: #333; color: white; margin: 10px;">Suma Totală:</label>
                <input type="text" name="suma_totala" id="suma_totala" class="form-control" style="border: 1px solid #ccc; margin: 10px;" readonly>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #5cb85c; color: #fff; padding: 5px; margin: 10px;">Cumpără Bilete</button>

        </form>
        
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51NOGeVCp1hoguf4ztqRYU6hccgD11U5aTcKIGR9PEZJLr6FlLfOyjPTF9MndqIRIsFhbkcvKLE5PBHZlZYCAGvOf00NazGxIbq');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Create an instance of the card Element.
        var style = {
    base: {
        color: '#333',
        fontFamily: 'Arial, sans-serif',
        fontSize: '16px',
    }
};
document.getElementById('numar_bilete').addEventListener('input', function () {
    // Obține valoarea introdusă în câmpul numar_bilete
    var numarBilete = document.getElementById('numar_bilete').value;

    // Calculează suma totală folosind atributul de data
    var pretBilet = parseFloat("{{ $event->pret }}"); // Convert the price to a float
    var sumaTotala = numarBilete * pretBilet;

    // Actualizează valoarea câmpului suma_totala
    document.getElementById('suma_totala').value = sumaTotala.toFixed(2) + ' lei'; // Use toFixed to limit decimal places
});

var card = elements.create('card', { style: style });


        // Add an instance of the card Element into the `card-element` div.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server.
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form.
            form.submit();
        }
        
    </script>
@endsection
