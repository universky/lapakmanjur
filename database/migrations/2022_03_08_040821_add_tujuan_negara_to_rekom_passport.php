<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTujuanNegaraToRekomPassport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekom_passports', function (Blueprint $table) {
            $table->string('tujuan_negara')->after('kartu_kuning_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekom_passports', function (Blueprint $table) {
            $table->dropColumn('tujuan_negara');
        });
    }
}
