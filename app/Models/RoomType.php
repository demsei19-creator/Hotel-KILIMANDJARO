<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['name', 'capacity', 'base_price'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
