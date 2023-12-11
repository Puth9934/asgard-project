<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffMgtStaffTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffmgt__staff_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('name');
            $table->string('description',200);
            
            $table->integer('staff_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['staff_id', 'locale']);
            $table->foreign('staff_id')->references('id')->on('staffmgt__staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffmgt__staff_translations', function (Blueprint $table) {
            $table->dropForeign(['staff_id']);
        });
        Schema::dropIfExists('staffmgt__staff_translations');
    }
}
