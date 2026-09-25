<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['room_id', 'customer_name', 'customer_email', 'check_in', 'check_out', 'total_amount', 'status'];

    public function room() 
    { 
        return $this->belongsTo(Room::class); 
    }
}
