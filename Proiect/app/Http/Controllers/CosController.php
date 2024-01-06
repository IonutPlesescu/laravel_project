<?php

namespace App\Http\Controllers;

use App\Models\Bilet;
use App\Models\Eveniment;

class CosController extends Controller
{
    public function adauga(Eveniment $event)
    {
        // Implement your logic to add the event to the cart
        // You can use sessions, databases, or a dedicated cart package for this

        // For example, using session:
        $cart = session()->get('cart', []);
        $cart[] = $event->id;
        session()->put('cart', $cart);

        return redirect()->route('cos.index')->with('success', 'Evenimentul a fost adăugat în coș.');
    }

    public function index()
{
    // Implement your logic to display the shopping cart page
    // You can retrieve the events from the cart and display details

    // For example, using session:
    $cart = session()->get('cart', []);
    $eventsInCart = Eveniment::whereIn('id', $cart)->get();
    $tipuriBilete = Bilet::select('tip', 'pret')->get();
  


    return view('cos.index', compact('eventsInCart', 'tipuriBilete'));
}

    public function sterge(Eveniment $event)
{
    // Implement your logic to remove the event from the cart
    // For example, using session:
    $cart = session()->get('cart', []);
    
    // Find the index of the event in the cart array
    $index = array_search($event->id, $cart);

    // Remove the event from the cart array
    if ($index !== false) {
        unset($cart[$index]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cos.index')->with('success', 'Evenimentul a fost șters din coș.');
}

}
