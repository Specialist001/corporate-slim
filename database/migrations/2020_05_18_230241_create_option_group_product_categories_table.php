<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionGroupProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_group_product_categories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->bigInteger('option_group_id')->unsigned();
            $table->bigInteger('product_category_id')->unsigned();

            $table->unique(['option_group_id', 'product_category_id'], 'option_group_product_categories_unique');

            $table->foreign('option_group_id')
                ->references('id')
                ->on('option_groups')
                ->onDelete('cascade');

            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
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
        Schema::table('option_group_product_categories', function (Blueprint $table) {
            $table->dropUnique('option_group_product_categories_unique');
        });
        Schema::dropIfExists('option_group_product_categories');
    }
}
