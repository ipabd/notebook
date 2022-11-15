<?php
use App\Http\Controllers\API\NotebookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('notebook', NotebookController::class);