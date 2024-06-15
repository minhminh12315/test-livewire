<?php

use App\Livewire\AddEmployee;
use App\Livewire\Dashboard;
use App\Livewire\EditEmployee;
use App\Livewire\EmployeeList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class);
Route::get('/', EmployeeList::class);
Route::get('/employees', EmployeeList::class);
Route::get('/add/new', AddEmployee::class);
Route::get('/edit/employee/{id}', EditEmployee::class);