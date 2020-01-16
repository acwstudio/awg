<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCharacteristicsTable
 */
class CreateCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('st_href');
            $table->string('st_type');
            $table->uuid('st_id');
            $table->json('st_set_characteristics');

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
        Schema::dropIfExists('characteristics');
    }
}
