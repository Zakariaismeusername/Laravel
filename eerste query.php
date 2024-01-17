<?php

'providers' => [
    // ...
    Clockwork\Support\Laravel\ClockworkServiceProvider::class,
],

'aliases' => [
    // ...
    'Clockwork' => Clockwork\Support\Laravel\Facade::class,
],


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PlanetController extends Controller
{
    public function index()
    {
        // Uitvoeren van een SELECT-query op de 'planets'-tabel
        $planets = DB::table('planets')->get();

        return view('planets.index', ['planets' => $planets]);
    }
}

use App\Http\Controllers\PlanetController;

Route::get('/planets', [PlanetController::class, 'index']);
?>