<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
         $user=$request->user();
         if($user->role==='admin'){
            $hotels=\App\Models\Hotel::with(['rooms'])->get();
            $totalHotels=$hotels->count();
            $totalRooms=\App\Models\Room::count();
            $totalGuests=\App\Models\Guest::count();
            $totalManagers=\App\Models\User::where('role','manager')->count();
            return \inertia('Dashboard',[
                'isAdmin'=>true,
                'hotels'=>$hotels,
                'totalHotels'=>$totalHotels,
                'totalRooms'=>$totalRooms,
                'totalManagers'=>$totalManagers,
                'totalGuests'=>$totalGuests,
            ]);
         }
         $hotelid=$user->hotel_id;
            $hotel=\App\Models\Hotel::where('hotel_id',$hotelid)->first();
            $guestsCount=\App\Models\Guest::where('hotel_id',$hotelid)->count();
            $roomsCount=\App\Models\Room::where('hotel_id',$hotelid)->count();
            $bookingsCount=\App\Models\Booking::where('hotel_id',$hotelid)->count();
            return \inertia('Dashboard',[
                'isAdmin'=>false,
                'hotel'=>$hotel,
                'guestsCount'=>$guestsCount,
                'roomsCount'=>$roomsCount,
                'bookingsCount'=>$bookingsCount,
            ]);
}
    }

