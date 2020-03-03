<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('page_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('short')->nullable();
            $table->text('full')->nullable();

            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_keywords')->nullable()->default(null);
            $table->text('meta_description')->nullable()->default(null);

            $table->string('locale')->index();

            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
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
        Schema::dropIfExists('page_translations');
    }
}
