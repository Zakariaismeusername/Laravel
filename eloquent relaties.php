<?php
php artisan make:migration create_solar_systems_table

// In de create_solar_systems_table migratie

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarSystemsTable extends Migration
{
    public function up()
    {
        Schema::create('solar_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Voeg andere relevante kolommen toe
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solar_systems');
    }
}

php artisan migrate

php artisan make:migration add_solar_system_id_to_planets_table

// In de add_solar_system_id_to_planets_table migratie

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSolarSystemIdToPlanetsTable extends Migration
{
    public function up()
    {
        Schema::table('planets', function (Blueprint $table) {
            $table->unsignedBigInteger('solar_system_id');
            $table->foreign('solar_system_id')->references('id')->on('solar_systems');
        });
    }

    public function down()
    {
        Schema::table('planets', function (Blueprint $table) {
            $table->dropForeign(['solar_system_id']);
            $table->dropColumn('solar_system_id');
        });
    }
}

php artisan migrate

php artisan make:model SolarSystem

// In het Planet model

use App\Models\SolarSystem;

class Planet extends Model
{
    public function solarSystem()
    {
        return $this->belongsTo(SolarSystem::class);
    }
}

// In het SolarSystem model

use App\Models\Planet;

class SolarSystem extends Model
{
    public function planets()
    {
        return $this->hasMany(Planet::class);
    }
}

php artisan migrate --path=/database/migrations/20220101000000_create_solar_systems_table.php
php artisan migrate --path=/database/migrations/20220102000000_add_solar_system_id_to_planets_table.php
?>