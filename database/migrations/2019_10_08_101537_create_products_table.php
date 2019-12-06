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
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('product_image_id')->nullable();

            $table->string('st_href');
            $table->string('st_type');
            $table->uuid('st_id')->index();
            $table->string('st_account_id');
            $table->string('st_owner_href');
            $table->boolean('st_shared');
            $table->string('st_version', 10);
            $table->dateTime('st_updated');
            $table->string('st_name');
            $table->text('st_description');
            $table->string('st_code');
            $table->string('st_ext_code');
            $table->boolean('st_archived');
            $table->string('st_path_name');
            $table->string('st_category_id')->nullable();
            $table->string('st_uom_id');
            $table->string('st_image_href');
            $table->decimal('st_min_price', 10, 2)->nullable();
            $table->decimal('st_sale_price', 10, 2);
            $table->decimal('st_buy_price', 10, 2);
            $table->string('st_supplier_href');
            $table->string('st_article');
            $table->double('st_weight', 8, 3);
            $table->double('st_volume', 8, 3);
            $table->string('st_barcodes');
            $table->string('st_stock');
            $table->string('st_reserve');
            $table->string('st_inTransit');
            $table->string('st_quantity');

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
