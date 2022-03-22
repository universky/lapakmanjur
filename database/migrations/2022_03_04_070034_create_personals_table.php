<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->integer('kartu_kuning_id');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('kewarganegaraan');
            $table->string('kondisi_fisik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('status_perkawinan');
            $table->string('agama');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kode_pos');
            $table->string('no_hp');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
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
        Schema::dropIfExists('personals');
    }
}
