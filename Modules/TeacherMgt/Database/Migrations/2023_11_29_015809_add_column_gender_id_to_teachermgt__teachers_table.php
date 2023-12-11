<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnGenderIdToTeachermgtTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachermgt__teachers', function (Blueprint $table) {
            $table->integer('gender_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachermgt__teachers', function (Blueprint $table) {
            $table->dropColumn('gender_id');
        });
    }
}
