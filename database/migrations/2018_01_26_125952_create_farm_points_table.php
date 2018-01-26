<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->boolean('receiver')->default(false);
            $table->boolean('sender')->default(false);
            $table->integer('farm_id');
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms');
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
        Schema::dropIfExists('farm_points');
    }
}
