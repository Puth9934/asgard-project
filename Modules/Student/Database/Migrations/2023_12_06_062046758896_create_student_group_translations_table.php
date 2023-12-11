<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGroupTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__group_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('group_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['group_id', 'locale']);
            $table->foreign('group_id')->references('id')->on('student__groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student__group_translations', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
        });
        Schema::dropIfExists('student__group_translations');
    }
}
