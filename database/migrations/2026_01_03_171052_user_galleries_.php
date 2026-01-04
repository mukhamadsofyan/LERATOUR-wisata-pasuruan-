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
        Schema::create('user_galeries', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('title')->nullable();

            $table->foreignId('kategori_id')
                ->nullable()
                ->constrained('kategoris')
                ->nullOnDelete();

            $table->string('uploader_name')->nullable();
            $table->enum('uploader_type', ['admin', 'user'])->default('user');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

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
