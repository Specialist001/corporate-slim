<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('option_group_id')->unsigned();
            $table->bigInteger('order')->unsigned()->nullable();
            $table->string('type')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('option_group_id')
                ->references('id')
                ->on('option_groups')
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
        Schema::dropIfExists('options');
    }
}
