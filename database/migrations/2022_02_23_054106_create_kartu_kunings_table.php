<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKuningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_kunings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nik');
            $table->string('no_pencari_kerja');
            $table->date('masa_berlaku');
            $table->date('date');
            $table->string('status');
            $table->string('alasan');
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
        Schema::dropIfExists('kartu_kunings');
    }
}
