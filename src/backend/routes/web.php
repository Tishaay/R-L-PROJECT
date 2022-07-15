<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//All Listings
Route::get('/', function () {
    return view(
        'listings',
        [
            'heading' => 'Latest Listings',
            'listings' => Listing::all(),
        ]
    );
    // return 'hello world';
});
// Single Listing
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

