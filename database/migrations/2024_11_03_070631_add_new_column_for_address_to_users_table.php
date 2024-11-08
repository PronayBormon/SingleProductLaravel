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
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('address_line')->nullable();
            $table->string('city')->nullable();
            $table->integer('country')->nullable();
            $table->string('postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('address_line');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('postal_code');
        });
    }
};
