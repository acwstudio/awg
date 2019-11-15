<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateWebhookHandlersTable
 */
class CreateWebhookHandlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhook_handlers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('href');
            $table->string('action');
            $table->string('account_id');
            $table->boolean('queued_up')->default(false);
            $table->boolean('done')->default(false);
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
        Schema::dropIfExists('webhook_handlers');
    }
}
