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
})->describe('Display an inspiring quote');

Artisan::command('q1', function() {
    $string = "floccinaucinihilipilification";
    $acc = [];

    foreach(str_split($string) as $char) {
        if(isset($acc[$char])) {
            $acc[$char]++;
        } else {
            $acc[$char] = 1;
        }
    }

    foreach($acc as $k => $v) {
        $this->comment($k . " appears " . $v . " times.");
    }
})->describe('The output for the code for question 1');

Artisan::command('q3', function() {
    function dir_contents($dir, &$results = array()) {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . '/' . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if (!(in_array($value, ['.', '..']))) {
                dir_contents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }

    print_r(dir_contents('./resources'));
})->describe('The output for the code for question 3');

