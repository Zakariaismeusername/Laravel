<?php
composer require laravel/telescope
php artisan telescope:install
php artisan migrate

php artisan telescope

composer require itsgoingd/clockwork

'Clockwork\Support\Laravel\ClockworkServiceProvider',

php artisan vendor:publish --provider='Clockwork\Support\Laravel\ClockworkServiceProvider'
?>
