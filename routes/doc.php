<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/auth', function (): View {
    return view('doc.openapi', ['page' => 'auth']);
});
