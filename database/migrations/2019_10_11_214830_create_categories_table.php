<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCategoriesTable
 */
class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('st_href');
            $table->string('st_type');
            $table->uuid('st_id');
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
            $table->uuid('st_nested_id');

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
