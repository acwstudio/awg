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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->uuid('store_id')->index();
            $table->uuid('product_folder')->nullable();
            $table->string('type');
            $table->boolean('shared');
            //$table->string('sync_id')->nullable();
            $table->string('version', 10);
            $table->dateTime('updated');
            $table->string('name');
            $table->string('img_name')->nullable();
            $table->string('img_extension')->nullable();
            $table->text('description');
            $table->string('code');
            $table->string('ext_code');
            $table->boolean('archived');
            $table->string('path_name');
            $table->string('uom');
            $table->decimal('price', 10, 2);
            $table->string('article');
            $table->string('store_image');
            $table->timestamps();
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
