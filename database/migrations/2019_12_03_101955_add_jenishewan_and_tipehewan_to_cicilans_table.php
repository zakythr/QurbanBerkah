<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenishewanAndTipehewanToCicilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cicilans', function (Blueprint $table) {
            $table->string("jenishewan");
            $table->dropColumn("perbulan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cicilans', function (Blueprint $table) {
            $table->dropColumn("jenishewan");
            $table->integer("perbulan");
        });
    }
}
