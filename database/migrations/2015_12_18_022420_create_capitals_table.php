<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapitalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('capitals', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            
            $table->enum('start_at', ['date','income','expenses']);
            $table->enum('end_at', ['date','income','expenses']);

            $table->datetime('date_start');
            $table->datetime('date_end');

            $table->unsignedInteger('income_start_id');
            $table->unsignedInteger('income_start');
            $table->unsignedInteger('income_end');

            $table->unsignedInteger('expenses_start_id');
            $table->integer('expenses_start');
            $table->integer('expenses_end');
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
		Schema::drop('capitals');
	}

}
