<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateVariantsTable
 */
class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');

            $table->string('st_href');
            $table->string('st_type');
            $table->uuid('st_id')->index();
            $table->string('st_account_id');
            $table->boolean('st_shared');
            $table->smallInteger('st_version');
            $table->dateTime('st_updated');
            $table->string('st_name');
            $table->string('st_code');
            $table->string('st_ext_code');
            $table->boolean('st_archived');
            $table->decimal('st_sale_price', 10, 2);
            $table->string('st_barcodes');
            $table->string('st_stock');
            $table->string('st_reserve');
            $table->string('st_in_transit');
            $table->string('st_quantity');
            $table->string('st_product_href');
            $table->string('st_product_id');

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
