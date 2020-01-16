<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCharacteristicVariantTable
 */
class CreateCharacteristicVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_variant', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('characteristic_id');
            $table->unsignedBigInteger('variant_id');

            $table->timestamps();

            $table->foreign('characteristic_id')->references('id')->on('characteristics')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristic_variant');
    }
}
