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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // pembeli
            $table->foreignId('assigned_admin_id')->nullable()->constrained('users')->nullOnDelete(); // admin yg handle (optional)
            $table->timestamp('last_message_at')->nullable();
            $table->string('status')->default('open'); // open/closed
            $table->timestamps();

            $table->unique(['user_id']); // 1 user = 1 inbox (shopee-like)
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
