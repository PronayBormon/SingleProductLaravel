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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->double('price', 15, 2)->default(0.00); 
            $table->integer('discount')->nullable();
            $table->integer('discount_type')->nullable();
            $table->integer('quantity')->default(0); 
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product');
    }
};
