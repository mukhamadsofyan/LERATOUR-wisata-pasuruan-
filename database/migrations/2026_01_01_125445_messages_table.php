<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('messages', function (Blueprint $table) {
      $table->id();

      // relasi ke conversation
      $table->foreignId('conversation_id')
            ->constrained('conversations')
            ->cascadeOnDelete();

      // pengirim pesan
      $table->foreignId('sender_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

      $table->enum('sender_role', ['user', 'admin', 'system'])->default('user');

      $table->text('body');
      $table->enum('type', ['text'])->default('text');

      // 🔗 RELASI KE TRANSAKSIS (PUNYAMU)
      $table->foreignId('transaksi_id')
            ->nullable()
            ->constrained('transaksis')
            ->nullOnDelete();

      $table->json('meta')->nullable();
      $table->timestamp('read_at')->nullable();

      $table->timestamps();
      $table->index(['conversation_id', 'created_at']);
    });
  }

  public function down(): void {
    Schema::dropIfExists('messages');
  }
};
