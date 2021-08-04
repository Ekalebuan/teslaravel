<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id_item');
            $table->string('kode_struk',20);
            $table->string('kode_produk',15);
            $table->bigInteger('hargasatuan');
            $table->integer('qty');
            $table->bigInteger('subtotal');

            $table->foreign('kode_struk')->references('kode_struk')->on('orders')->onDelete('cascade');
            $table->foreign('kode_produk')->references('kode_produk')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::defaultStringLength(255);
    }
}
