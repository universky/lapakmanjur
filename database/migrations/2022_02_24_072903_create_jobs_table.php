<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('kategori');
            $table->string('nama_pekerjaan');
            $table->integer('gaji1');
            $table->integer('gaji2');
            $table->string('jam_kerja');
            $table->string('pengalaman');
            $table->string('kemampuan_wajib');
            $table->string('kemampuan_tambahan');
            $table->string('deskripsi');
            $table->date('tgl_buat');
            $table->date('batas_tgl');
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
        Schema::dropIfExists('jobs');
    }
}
