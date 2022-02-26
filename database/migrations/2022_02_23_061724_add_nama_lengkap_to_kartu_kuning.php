<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaLengkapToKartuKuning extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kartu_kunings', function (Blueprint $table) {
            $table->string('nama_lengkap')->after('no_pencari_kerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kartu_kunings', function (Blueprint $table) {
            $table->dropColumn('nama_lengkap');
        });
    }
}
