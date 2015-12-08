<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolyDayu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('da_yus', function (Blueprint $table) {
            $table->integer('dayuable_id');
            $table->string('dayuable_type');
            $table->index(['dayuable_type','dayuable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('da_yus', function (Blueprint $table) {
            $table->dropColumn('dayuable_id');
            $table->dropColumn('dayuable_type');
            $table->dropIndex(['dayuable_type','dayuable_id']);            
        });
    }
}
