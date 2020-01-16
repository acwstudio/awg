<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateStoreImagesTable
 */
class CreateStoreImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_image_id');

            $table->uuid('st_id');
            $table->string('st_href_download');
            $table->string('st_title');
            $table->string('st_file_name');
            $table->integer('st_size');
            $table->dateTime('st_updated');
            $table->string('st_mini_href_download');
            $table->string('st_tiny_href_download');

            $table->timestamps();

            $table->foreign('product_image_id')->references('id')->on('product_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_images');
    }
}
