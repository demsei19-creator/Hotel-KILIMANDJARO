<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'reservation_date', 'reservation_time', 'guests', 'status'];
}
