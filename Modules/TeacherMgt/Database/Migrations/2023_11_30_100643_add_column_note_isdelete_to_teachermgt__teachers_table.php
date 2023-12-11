<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNoteIsdeleteToTeachermgtTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachermgt__teachers', function (Blueprint $table) {
            $table->string('note',100)->nullable();
            $table->integer('is_delete')->default(0)->nullable();
          
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
            $table->dropColumn('note');
            $table->dropColumn('is_delete');
        });
    }
}
