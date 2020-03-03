<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_category_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('page_category_id')->unsigned();
            $table->string('name')->nullable();

            $table->string('locale')->index();

            $table->unique(['page_category_id', 'locale']);
            $table->foreign('page_category_id')
                ->references('id')
                ->on('page_categories')
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
        Schema::dropIfExists('page_category_translations');
    }
}
