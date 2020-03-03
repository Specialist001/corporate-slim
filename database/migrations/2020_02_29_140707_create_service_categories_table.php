<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->boolean('active')->default(1);
            $table->bigInteger('order')->nullable()->default(0);
            $table->string('image')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_categories');
    }
}
