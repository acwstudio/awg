<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUnitsTable
 */
class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('st_href');
            $table->string('st_type');
            $table->uuid('st_id');
            $table->string('st_version', 10);
            $table->dateTime('st_updated');
            $table->string('st_name');
            $table->text('st_description');
            $table->string('st_code');
            $table->string('st_ext_code');

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
        Schema::dropIfExists('units');
    }
}
