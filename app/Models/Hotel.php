<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Hotel extends Model
{
    //
      use HasFactory;
    
    protected $primaryKey = 'hotel_id';
       protected $fillable = [
'hotel_name',
'address',
'phone_number',	
    ];
    public $timestamps = false;
    public function rooms(){
        return $this->hasMany(Room::class, 'hotel_id', 'hotel_id');
    }
}
