<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Booking;
use App\Models\Invoice;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'payments';
    protected $fillable = [
        'booking_id',
        'method',
        'amount',
        'status'
    ];

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
