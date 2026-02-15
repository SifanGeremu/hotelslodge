<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->unsignedBigInteger('hotel_id');
            $table->string('room_number',50);
            $table->enum('type',['single','double','suite','deluxe']);
            $table->decimal('price_per_night', 8, 2);
            $table->enum('status',['available','occupied','maintenance'])->default('available');
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onDelete('cascade');
            $table->timestamps('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
