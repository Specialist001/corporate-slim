<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_category_id')->unsigned();
            $table->string('slug')->nullable()->default(null);
            $table->boolean('active')->default(1);
            $table->bigInteger('order')->nullable()->default(0);
            $table->string('image')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);

            $table->timestamps();

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
        Schema::dropIfExists('services');
    }
}
