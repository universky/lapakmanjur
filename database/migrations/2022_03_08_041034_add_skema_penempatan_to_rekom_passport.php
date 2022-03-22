<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkemaPenempatanToRekomPassport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekom_passports', function (Blueprint $table) {
            $table->string('skema_penempatan')->after('tujuan_negara');
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
            $table->dropColumn('skema_penampatan');
        });
    }
}
