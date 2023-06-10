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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemohon');
            $table->date('tanggal_pinjaman');
            $table->string('besar_pinjaman');
            $table->decimal('bunga', 4, 2);
            $table->string('angsuran');
            $table->string('jangka_waktu');
            $table->timestamps();

            $table->foreign('id_pemohon')->references('id')->on('pemohons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
