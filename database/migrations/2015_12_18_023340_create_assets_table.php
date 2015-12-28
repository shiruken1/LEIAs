<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('capital_id');
            $table->foreign('capital_id')->references('id')->on('capitals');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('value');
            $table->integer('growth_rate');
            $table->enum('pattern', ['linear', 'square', 'sine', 'random']);
            $table->integer('growth_min');
            $table->integer('growth_max');
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
        Schema::drop('assets');
    }

}
