<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->string('name', 127);
            $table->double('price', 8, 2)->default(0);
            $table->double('discount_price', 8, 2)->default(0);
            $table->text('description')->nullable();
            $table->double('capacity', 9, 2)->default(0);
            $table->double('package_items_count', 9, 2)->default(0); // added
            $table->string('unit', 127)->nullable(); // added
            $table->boolean('featured')->default(0);
            $table->boolean('deliverable')->default(1); // added
            $table->integer('market_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
