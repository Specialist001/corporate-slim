<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('active')->default(1);
            $table->bigInteger('order')->default(0);
            $table->boolean('top')->default(0);
            $table->boolean('bottom')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_categories');
    }
}
