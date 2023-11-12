<?php

use App\Models\customer;
use App\Models\vehicle;
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
        //untuk membuat database order dimana meminta data customer dan vehicle
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(customer::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete(); // relasi ke tabel customers
            $table->foreignIdFor(vehicle::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete(); // relasi ke tabel vehicles
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //untuk drop table
        Schema::dropIfExists('orders');
    }
};
