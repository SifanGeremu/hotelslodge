<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Booking extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'booking_id';
       protected $fillable = [
'hotel_id',	
'guest_id',	
'room_id',	
'checkin_date',	
'checkout_date',	
'created_at',	
'updated_at',	
    ];
    public $timestamps = false;
}
