<?php

use App\Livewire\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', UserList::class);

