<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('pay_method')->unsigned()->nullable()->default(null);
            $table->bigInteger('delivery_type');
            $table->bigInteger('delivery_id')->nullable()->default(null);
            $table->bigInteger('delivery_price')->nullable()->default(null);
            $table->bigInteger('sum');

            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable()->default(null);
            $table->text('address');
            $table->text('comment')->nullable()->default(null);

            $table->smallInteger('pay_status');
            $table->smallInteger('status');
            
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table->foreign('pay_method')
                ->references('id')
                ->on('payments')
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
        Schema::dropIfExists('orders');
    }
}
