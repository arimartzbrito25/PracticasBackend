<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::post('/v1/email/send', [EmailController::class, 'send']);