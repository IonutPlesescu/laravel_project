<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BileteController;
use App\Http\Controllers\CosController;
use App\Http\Controllers\CustomAdminController;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\ParteneriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('eveniment', EvenimentController::class);
Route::resource('evenimente', EvenimentController::class);
Route::get('/evenimente/cumpara-bilete/{event}', [EvenimentController::class, 'cumparaBilet'])->name('evenimente.cumpara-bilete');
Route::get('/eveniment/{event}', [EvenimentController::class, 'show'])->name('eveniment.show');
Route::delete('/evenimente/{eveniment}', 'EvenimentController@destroy')->name('evenimente.destroy');
Route::get('/eveniment/{eveniment}/edit', [EvenimentController::class, 'edit'])->name('eveniment.edit');
Route::post('/eveniment/{id}/update',[EvenimentController::class, 'update'])->name('eveniment.update');
Route::match(['put', 'patch'], '/eveniment/{id}/update', [EvenimentController::class, 'update'])->name('eveniment.update');
Route::delete('/cos/sterge/{event}', [CosController::class, 'sterge'])->name('cos.sterge');
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);
Route::resource('parteneri', ParteneriController::class);
Route::post('/cos/adauga/{event}', [CosController::class, 'adauga'])->name('cos.adauga');
Route::get('/cos', [CosController::class, 'index'])->name('cos.index');
Route::get('/parteneri/{parteneri}/edit', [ParteneriController::class, 'edit'])->name('parteneri.edit');
Route::get('/bilete/{bilet}/edit', [BileteController::class, 'edit'])->name('bilete.edit');
Route::put('/bilete/{bilet}', [BileteController::class, 'update'])->name('bilete.update');
Route::delete('/bilete/{bilet}', [BileteController::class, 'destroy'])->name('bilete.destroy');
Route::resource('admins', CustomAdminController::class);
Route::resource('sponsors', SponsorController::class);
Route::resource('bilete', BileteController::class);
Route::get('/custom_admins/create', [CustomAdminController::class, 'create'])->name('custom_admins.create');
Route::post('/custom_admins', [CustomAdminController::class, 'store'])->name('custom_admins.store');
Route::get('/custom_admins', [CustomAdminController::class, 'index'])->name('custom_admins.index');
Route::get('/custom_admins/{custom_admin}', [CustomAdminController::class, 'show'])->name('custom_admins.show');
Route::get('/custom_admins/{custom_admin}/edit', [CustomAdminController::class, 'edit'])->name('custom_admins.edit');
Route::put('/custom_admins/{custom_admin}', [CustomAdminController::class, 'update'])->name('custom_admins.update');
Route::delete('/custom_admins/{custom_admin}', [CustomAdminController::class, 'destroy'])->name('custom_admins.destroy');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::post('/login', [AdminAuthController::class, 'login']);
    // Alte rute pentru autentificare/deautentificare
});
Route::get('/custom-admin', [CustomAdminController::class, 'index'])->name('custom_admin.index');
Route::post('/cos/process-payment', function (Request $request) {
    // Set your Stripe API key.
    Log::info($request->all());
    \Stripe\Stripe::setApiKey("sk_test_51NOGeVCp1hoguf4zNQEDdPBrSsigSCGOMRdHz3KrPcLWN7tcYBxuYc2CS8ErHl2w2tATWlwVTSktQpEOooxZDX4s00wDmxhylf");
    
       
        $sumaTotala = floatval($request->input('suma_totala'));
        $amount = max(floatval($request->input('total-input')) * 100, 100); // Set a minimum amount of 100 (or adjust as needed)


    $charge = \Stripe\Charge::create([
        'amount' => $amount,
        'currency' => 'ron',
        'source' => $request->input('stripeToken'),
    ]);

    
        
        return sprintf('Plata inregistrata cu success! %d lei', $amount / 100);
})->name('cos.process.payment');

Route::get('/cos/payment-success', [CosController::class, 'paymentSuccess'])->name('cos.payment.success');





    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin_users.index');
    Route::put('/admin/users/{user}/toggle-role', [AdminUserController::class, 'toggleRole'])->name('admin_users.toggle_role');
    Route::get('/charge', function () {
        return view('charge');
    });
    Route::post('/evenimente/cumpara-bilete/{event}', function (Request $request) {
        // Set your Stripe API key.
        \Stripe\Stripe::setApiKey("sk_test_51NOGeVCp1hoguf4zNQEDdPBrSsigSCGOMRdHz3KrPcLWN7tcYBxuYc2CS8ErHl2w2tATWlwVTSktQpEOooxZDX4s00wDmxhylf");
    
       
        $sumaTotala = floatval($request->input('suma_totala'));
        $amount = $sumaTotala * 100;
        $email = $request->input('nume'); 
    
        // Create a new Stripe charge.
        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'ron',
            'source' => $request->input('stripeToken'),
        ]);
    
        
        return sprintf('Plata inregistrata cu success! %d lei', $amount / 100);

        
    });




require __DIR__.'/auth.php';
