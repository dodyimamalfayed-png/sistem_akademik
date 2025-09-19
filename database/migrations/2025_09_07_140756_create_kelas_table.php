<?php

// database/migrations/xxxx_xx_xx_create_kelas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
    Schema::create('kelas', function (Blueprint $table) {
    $table->id('id_kelas');
    $table->string('nama_kelas');
    $table->unsignedBigInteger('wali_kelas_id')->nullable();
    $table->foreign('wali_kelas_id')
          ->references('id')
          ->on('users')
          ->onDelete('set null');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
