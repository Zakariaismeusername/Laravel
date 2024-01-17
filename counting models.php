<?php

use App\Models\SolarSystem;

public function index()
{
    $solarSystems = SolarSystem::withCount('planets')->get();

    return view('solarsystems.index', compact('solarSystems'));
}


public function planets()
{
    return $this->hasMany(Planet::class);
}

<!-- solarsystems/index.blade.php -->

@foreach($solarSystems as $solarSystem)
    <p>{{ $solarSystem->name }} - Number of Planets: {{ $solarSystem->planets_count }}</p>
@endforeach
?>