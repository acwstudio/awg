<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateProductsTable
 */
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
            $table->unsignedBigInteger('category_id');
            $table->uuid('store_id');
            $table->boolean('shared');
            $table->string('sync_id')->nullable();
            $table->string('version', 10);
            $table->dateTime('updated');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code');
            $table->string('ext_code');
            $table->boolean('archived');
            $table->string('path_name');
            $table->string('uom');
            $table->string('price');
            $table->string('article');
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
