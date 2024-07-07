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
        Schema::create('response_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('controller_id')->nullable();
            $table->foreign('controller_id')->references('id')->on('users')->onDelete('set null');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('drone_id')->nullable();
            $table->foreign('drone_id')->references('id')->on('drones')->onDelete('set null');
            $table->unsignedBigInteger('disaster_id')->nullable();
            $table->foreign('disaster_id')->references('id')->on('disasters')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_logs');
    }
};
