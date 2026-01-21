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
        Schema::create('laptops', function (Blueprint $table) {
    $table->id();
    $table->string('brand');
    $table->string('model');
    $table->string('serial_number')->unique();
    $table->integer('stock')->default(1);
    $table->integer('max_stock')->default(10); // ✅ ADD THIS
    $table->decimal('rental_price', 8, 2);
    $table->text('description')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
