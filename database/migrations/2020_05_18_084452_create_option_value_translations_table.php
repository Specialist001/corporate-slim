<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionValueTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_value_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('option_value_id')->unsigned();
            $table->string('name')->nullable();

            $table->string('locale')->index();

            $table->unique(['option_value_id', 'locale']);
            $table->foreign('option_value_id')
                ->references('id')
                ->on('option_values')
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
        Schema::dropIfExists('option_value_translations');
    }
}
