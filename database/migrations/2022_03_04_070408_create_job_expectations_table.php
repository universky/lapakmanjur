<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobExpectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_expectations', function (Blueprint $table) {
            $table->id();
            $table->string('penempatan');
            $table->string('provinsi_harapan');
            $table->string('kab_harapan');
            $table->string('goljab_harapan');
            $table->string('jenis_goljab_harapan');
            $table->string('sistem_pembayaran_harapan');
            $table->integer('min_gaji_harapan');
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
        Schema::dropIfExists('job_expectations');
    }
}
