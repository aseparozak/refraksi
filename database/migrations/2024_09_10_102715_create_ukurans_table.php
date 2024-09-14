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
        Schema::create('ukurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->decimal('right_sph', 5, 2)->nullable();
            $table->decimal('right_cyl', 5, 2)->nullable();
            $table->integer('right_axis')->nullable();
            $table->decimal('right_add', 5, 2)->nullable();
            $table->decimal('right_mpd', 5, 2)->nullable();
            $table->decimal('right_prisma', 5, 2)->nullable();
            $table->decimal('right_visus', 5, 2)->nullable();
            $table->decimal('left_sph', 5, 2)->nullable();
            $table->decimal('left_cyl', 5, 2)->nullable();
            $table->integer('left_axis')->nullable();
            $table->decimal('left_add', 5, 2)->nullable();
            $table->decimal('left_mpd', 5, 2)->nullable();
            $table->decimal('left_prisma', 5, 2)->nullable();
            $table->decimal('left_visus', 5, 2)->nullable();
            $table->timestamps();
    
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukurans');
    }
};
