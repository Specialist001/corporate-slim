<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('page_category_id')->unsigned()->nullable();
            $table->string('type')->nullable()->default(null);
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();

            $table->boolean('active')->default(1);
            $table->integer('order')->default(0);

            $table->boolean('top')->default(0);
            $table->boolean('system')->default(0);

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
        Schema::dropIfExists('pages');
    }
}
