<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Eveniment;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class EvenimentController extends Controller
{
    public function index()
    {
        // Obține toate înregistrările din tabela evenimente
        $events = Eveniment::all();

        // Returnează view-ul index.blade.php și transmite datele
        return view('eveniment.index', ['events' => $events]);
    }
    public function create()
    {
        return view('eveniment.create');
    }

    public function store(Request $request)
    {
        // Validează datele și salvează evenimentul în baza de date
        $event = Eveniment::create($request->all());

        return redirect()->route('eveniment.index')->with('success', 'Eveniment creat cu succes!');
    }

    public function edit(Eveniment $eveniment)
    {
        // Ensure that $eveniment has a valid ID

    
        return view('eveniment.edit', compact('eveniment'));
    }
    public function update(Request $request, $id)
    {
        $event = Eveniment::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('eveniment.index')->with('success', 'Eveniment editat cu succes!');
    }
    public function destroy(Eveniment $eveniment)
{
    // Logica pentru ștergerea evenimentului din baza de date
    $eveniment->delete();

    return redirect()->route('eveniment.index')->with('success', 'Eveniment șters cu succes!');
}

    public function cumparaBilet(Eveniment $event)
{
    // Logica pentru cumpărarea biletelor
    // Aici poți adăuga orice proces de cumpărare a biletelor

    return view('eveniment.cumpara-bilete', compact('event'));
}
public function cumparaBiletStripe(Request $request, Eveniment $event)
{
    // Obține utilizatorul autentificat
    $user = Auth::user();

    // Setează cheia API pentru Stripe (preferabil, setează-o în fișierul de configurare)
    Stripe::setApiKey(config('services.stripe.secret'));

    try {
        // Creează o sesiune de plată cu Stripe Checkout
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'unit_amount' => $event->pret * $request->input('numar_bilete') * 100, // Pretul în cenți
                        'currency' => 'RON',
                        'product_data' => [
                            'name' => $event->nume,
                        ],
                    ],
                    'quantity' => $request->input('numar_bilete'),
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('eveniment.show', ['id' => $event->id]), // Adaugă o rută validă de succes
            'cancel_url' => route('eveniment.show', ['id' => $event->id]), // Adaugă o rută validă de anulare
        ]);

        // Returnează informațiile sesiunii către fișierul Blade
        return view('eveniment.cumpara-bilete', compact('event', 'session'));
    } catch (\Exception $e) {
        // Tratează orice eroare care apare în timpul procesului de plată
        return back()->with('error', $e->getMessage());
    }
}

public function show($id)
{
    $event = Eveniment::find($id);

    if (!$event) {
        // Poți să faci redirect către o altă pagină sau să afișezi un mesaj de eroare.
        return redirect()->route('eveniment.index')->with('error', 'Evenimentul nu a fost găsit.');
    }

    return view('eveniment.show', compact('event'));
}
}
