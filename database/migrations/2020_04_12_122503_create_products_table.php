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
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('id_type')->unsigned()->nullable();
            $table->foreign('id_type')->references('id')->on('product_types');
            $table->mediumText('description')->nullable();
            $table->float('unit_price', 8, 2)->nullable();
            $table->integer('promotion')->nullable()->default(0);
            $table->text('image')->nullable();
            $table->boolean('speciality')->default(0);
            $table->boolean('sale')->default(0);
            $table->string('slug')->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('user_deleted')->nullable();
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
        Schema::dropIfExists('products');
    }
}
