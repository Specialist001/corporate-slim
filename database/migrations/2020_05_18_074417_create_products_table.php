<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_category_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('unit_id')->unsigned()->nullable()->default(null);
            
            $table->bigInteger('amount')->unsigned()->nullable()->default(null);
            
            $table->bigInteger('old_price')->unsigned()->nullable()->default(null);
            $table->bigInteger('price')->unsigned();
            
            $table->integer('warranty')->unsigned()->nullable()->default(null);
            $table->string('sku')->nullable()->default(null);
            $table->string('manufacturer')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            
            $table->boolean('active')->default(1);
            $table->boolean('on_main')->default(0);

            $table->text('wholesale')->nullable()->default(null);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('SET NULL');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
