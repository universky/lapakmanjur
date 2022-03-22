<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKartuKuningIdToJobExpectation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_expectations', function (Blueprint $table) {
            $table->integer('kartu_kuning_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_expectations', function (Blueprint $table) {
            $table->dropColumn('kartu_kuning_id');
        });
    }
}
