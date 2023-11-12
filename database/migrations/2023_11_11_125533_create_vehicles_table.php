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

        // untuk membuat database vehicle
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('vehicle_type', 20);
            $table->char('vehicle_model', 50);
            $table->integer('vehicle_year');
            $table->integer('vehicle_passenger_amount');
            $table->char('vehicle_manufacture', 50);
            $table->decimal('vehicle_price',20,2);
            //untuk truck dan mobil
            $table->char('vehicle_fuel_type')->nullable();//untuk truck dan mobil
            $table->integer('vehicle_trunk_space')->nullable();//untuk mobil
            $table->integer('vehicle_tire_amount')->nullable();//untuk truck
            $table->integer('vehicle_cargo_space')->nullable();//untuk truck
            $table->integer('vehicle_baggage_space')->nullable();//untukmotor
            $table->double('vehicle_fuel_capacity')->nullable();//untuk semua
            $table->string('vehicle_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //untuk drop table
        Schema::dropIfExists('vehicles');
    }
};
