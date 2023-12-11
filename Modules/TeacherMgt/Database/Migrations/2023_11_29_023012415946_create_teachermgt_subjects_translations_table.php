<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachermgtsubjectsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachermgt__subjects_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('subjects_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['subjects_id', 'locale']);
            $table->foreign('subjects_id')->references('id')->on('teachermgt__subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachermgt__subjects_translations', function (Blueprint $table) {
            $table->dropForeign(['subjects_id']);
        });
        Schema::dropIfExists('teachermgt__subjects_translations');
    }
}
