<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('init', function () {
    $dir = getcwd();
    if (file_exists("$dir/.env")) {
        $this->comment('.env file already exists.');
    } elseif (!file_exists("$dir/.env.example")) {
        $this->error('Can\'t find .env.example file.');
    } else {
        copy("$dir/.env.example", "$dir/.env");
        if (!file_exists("$dir/.env")) {
            $this->error('Can\'t created .env file.');
        } else {
            $this->info('Created .env file...');

            $this->call('key:generate', ['--ansi']);
        }
    }
})->purpose('Init .env file with key');
