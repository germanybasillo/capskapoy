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
        Schema::create('bedassigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenantprofile_id')->constrained()->onDelete('cascade'); // Foreign key for Tenantprofile
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('bed_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bedassigns');
    }
};
