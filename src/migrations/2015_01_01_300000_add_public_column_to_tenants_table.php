<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicColumnToTenantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table( 'tenants', function ( Blueprint $table ) {
			$table->boolean('public')->default(false);
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'tenants', function ( Blueprint $table ) {
			$table->dropColumn(
				'public'
			);
		} );
	}

}
