<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $table = 'planets';
}


namespace App\Http\Controllers;

use App\Models\Planet;

class PlanetController extends Controller
{
    public function index()
    {
        // Gebruik van het Planet-model om gegevens op te halen
        $planets = Planet::all();

        return view('planets.index', ['planets' => $planets]);
    }
}

use App\Http\Controllers\PlanetController;

Route::get('/planets', [PlanetController::class, 'index']);
