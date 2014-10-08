<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnalysesBaCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analyse_ba_categories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('analyse_id')->unsigned()->index();
            $table->integer('ba_categories_id')->unsigned()->index();
            $table->integer('sorting')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('analyse_ba_categories');
	}

}