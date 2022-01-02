<?php

use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;



Route::post('generate-ticket', [TicketsController::class,'generateTicket']);


