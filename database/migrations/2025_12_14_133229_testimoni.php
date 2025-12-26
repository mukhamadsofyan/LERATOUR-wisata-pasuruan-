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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->nullable();
            $table->string('notelp')->nullable();
            $table->string('keterangan')->nullable();
            $table->text('deskripsi_testimoni')->nullable();
            $table->string('foto_testimoni')->nullable();

            // STATUS TESTIMONI
            // tunggu  = baru dikirim user
            // terima  = disetujui admin
            $table->enum('status', ['tunggu', 'terima', 'tolak'])->default('tunggu');

            $table->timestamps();
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
