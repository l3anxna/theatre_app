<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'show_id',
        'customer_name',
        'customer_email',
        'seat_number',
        'tickets',
        'payment_status',
        'payment_reference',
    ];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
