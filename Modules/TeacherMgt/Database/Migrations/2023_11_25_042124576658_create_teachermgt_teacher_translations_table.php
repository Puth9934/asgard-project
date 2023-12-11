<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherMgtTeacherTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachermgt__teacher_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address')->nullable();
            // Your translatable fields

            $table->integer('teacher_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['teacher_id', 'locale']);
            $table->foreign('teacher_id')->references('id')->on('teachermgt__teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachermgt__teacher_translations', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
        });
        Schema::dropIfExists('teachermgt__teacher_translations');
    }
}
