<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_mapel');
            $table->integer('nilai'); // bisa diganti decimal jika perlu
            $table->timestamps();

            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('mata_pelajaran')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
