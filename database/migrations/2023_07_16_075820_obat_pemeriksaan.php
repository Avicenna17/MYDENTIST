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
        Schema::create('obat_pemeriksaan', function (Blueprint $table) {
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('pemeriksaan_id');
            $table->timestamps();

      
            // Add a unique constraint to avoid duplicates
            $table->unique(['obat_id', 'pemeriksaan_id']);
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
