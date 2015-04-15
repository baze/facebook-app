<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'prices', function ( Blueprint $table ) {
			$table->engine = 'InnoDB';
			$table->increments( 'id' );

			$table->string( 'title' );
			$table->text( 'description' )->nullable();
			$table->string( 'image' )->nullable();

			$table->integer( 'tenant_id' )->unsigned()->nullable();
			$table->foreign( 'tenant_id' )
			      ->references( 'id' )->on( 'tenants' )
			      ->onDelete( 'cascade' );

			$table->timestamps();
		} );

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'prices' );
	}

}
