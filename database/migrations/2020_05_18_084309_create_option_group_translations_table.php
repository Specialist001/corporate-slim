<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionGroupTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_group_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('option_group_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('short')->nullable();

            $table->string('locale')->index();

            $table->unique(['option_group_id', 'locale']);
            $table->foreign('option_group_id')
                ->references('id')
                ->on('option_groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_group_translations');
    }
}
