<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvoiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
  'plans'     => PlanController::class,
  'spaces'    => SpaceController::class,
  'rooms'     => RoomController::class,
  'amenities' => AmenityController::class,
  'members'   => MemberController::class,
  'bookings'  => BookingController::class,
  'payments'  => PaymentController::class,
  'invoices'  => InvoiceController::class,
]);
// Relación amenities<->rooms (atach/detach) como endpoints específicos:
Route::post('rooms/{room}/amenities/{amenity}', [RoomController::class,'attachAmenity']);
Route::delete('rooms/{room}/amenities/{amenity}', [RoomController::class,'detachAmenity']);