<?php
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return ['status' => 'ok'];
});
