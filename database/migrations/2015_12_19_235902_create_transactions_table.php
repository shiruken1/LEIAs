<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('amount');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('capital_id');
            $table->foreign('capital_id')->references('id')->on('capitals');
            
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
		Schema::drop('transactions');
	}

}
