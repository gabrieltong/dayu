<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaYusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('da_yus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('smsType')->index();
            $table->string('smsFreeSignName')->index();
            $table->string('smsParam')->index();
            $table->string('recNum')->index();
            $table->string('smsTemplateCode')->index();
            $table->string('appkey')->index();
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
        Schema::drop('da_yus');
    }
}
