<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateWebhooksTable
 */
class CreateWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhooks', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->uuid('store_id')->index();
            $table->string('type');
            $table->string('href');
            $table->string('entity_type');
            $table->string('url');
            $table->string('method');
            $table->string('enabled');
            $table->string('action');
            $table->string('account_id');
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
        Schema::dropIfExists('webhooks');
    }
}
