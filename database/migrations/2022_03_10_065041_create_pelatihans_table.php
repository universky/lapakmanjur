<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi');
            $table->string('nama_lpk');
            $table->string('nama_pelatihan');
            $table->string('kategori');
            $table->string('phone');
            $table->string('alamat');
            $table->string('email');
            $table->integer('jumlah_paket');
            $table->integer('jumlah_peserta');
            $table->string('status');
            $table->string('alasan');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihans');
    }
}
