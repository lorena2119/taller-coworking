<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Payment;
use App\Models\Member;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'invoices';
    protected $fillable = [
        'payment_id',
        'number',
        'issued_date',
        'meta'
    ];

    public function payments(){
        return $this->belongsTo(Payment::class);
    }
}
