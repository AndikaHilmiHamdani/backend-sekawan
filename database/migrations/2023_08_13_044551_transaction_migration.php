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
        //
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manajer_name')->nullable();
            $table->unsignedBigInteger('car_name')->nullable();
            $table->unsignedBigInteger('driver_name')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('manajer_name')->references('id')->on('users');
            $table->foreign('car_name')->references('id')->on('car');
            $table->foreign('driver_name')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
