<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateStoreProductImagesTable
 */
class CreateStoreProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('img_name')->nullable();
            $table->string('img_ext')->nullable();
            $table->boolean('active');

            $table->string('st_id');
            $table->string('st_href_download');
            $table->string('st_title');
            $table->string('st_file_name');
            $table->string('st_size');
            $table->string('st_updated');
            $table->string('st_mini_href_download');
            $table->string('st_tiny_href_download');

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
        Schema::dropIfExists('store_product_images');
    }
}
