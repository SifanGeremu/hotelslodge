<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Guest extends Model
{
    
      use HasFactory;
    
    protected $primaryKey = 'guest_id';
       protected $fillable = [
'hotel_id',	
'first_name',
'last_name',
'email',
'phone_number',
'checkin_date',	
'checkout_date',	
    ];
    public $timestamps = false;
}
