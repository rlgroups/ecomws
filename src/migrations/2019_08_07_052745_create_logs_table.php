<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->index();
            $table->string('called')->nullable()->index();
            $table->ipAddress('ip')->nullable()->index();
            $table->longText('request')->nullable();
            $table->longText('response')->nullable();
            $table->longText('data')->nullable();
            $table->string('request_time')->nullable();
            $table->longText('request_data')->nullable();
            $table->timestamp('request_at')->nullable()->index();
            $table->timestamp('response_at')->nullable();
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
        Schema::dropIfExists('logs');
    }
}
