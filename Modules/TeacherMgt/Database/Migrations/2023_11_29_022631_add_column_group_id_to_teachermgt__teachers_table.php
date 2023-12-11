<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnGroupIdToTeachermgtTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachermgt__teachers', function (Blueprint $table) {
            $table->integer('subjects_id')->nullable()->after('hire_date');
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
            $table->dropColumn('subjects_id');
        });
    }
}
