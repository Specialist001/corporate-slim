<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_category_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_category_id')->unsigned();
            $table->string('title')->nullable()->default(null);
            $table->string('short')->nullable()->default(null);
            $table->text('full')->nullable()->default(null);

            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_keywords')->nullable()->default(null);
            $table->text('meta_description')->nullable()->default(null);

            $table->string('locale')->index();

            $table->unique(['service_category_id', 'locale']);

            $table->foreign('service_category_id')
                ->references('id')
                ->on('service_categories')
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
        Schema::dropIfExists('service_category_translations');
    }
}
