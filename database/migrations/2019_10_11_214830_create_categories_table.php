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
            $table->string('type');
            $table->uuid('store_id');
            $table->uuid('productFolder')->nullable();
            $table->boolean('shared');
            $table->string('version', 10);
            $table->dateTime('updated');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code')->nullable();
            $table->string('ext_code');
            $table->boolean('archived');
            $table->string('path_name');
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
        Schema::dropIfExists('categories');
    }
}
