<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Room extends Model
{
    //
      use HasFactory;
    
    protected $primaryKey = 'room_id';
       protected $fillable = [
'hotel_id',	
'room_number',
'room_type',
'price_per_night',
'is_available',
'phone_number',	
    ];
    public $timestamps = false;
}
