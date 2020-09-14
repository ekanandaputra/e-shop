<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->Increments('detail_order_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('pcs');

            $table->foreign('order_id')
                 ->references('order_id')
                 ->on('orders')
                 ->onUpdate('cascade')
                 ->onDelete('cascade');

            $table->foreign('product_id')
                 ->references('product_id')
                 ->on('products')
                 ->onUpdate('cascade')
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
        Schema::dropIfExists('detail_orders');
    }
}
