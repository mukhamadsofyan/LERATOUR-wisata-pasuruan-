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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->string('order_id')->unique();
            $table->string('nama_wisata');

            $table->string('nama_pemesan');
            $table->string('email');

            $table->integer('harga_tiket');
            $table->integer('jumlah_tiket');
            $table->integer('total_bayar');

            $table->string('payment_status')->default('pending');
            // pending | settlement | expire | cancel | failure

            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
