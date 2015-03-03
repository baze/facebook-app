<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacebookColumnsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			// If the primary id in your you user table is different than the Facebook id
			// Make sure it's an unsigned() bigInteger()
			$table->bigInteger( 'fb_id' )->unsigned()->index();
			// Normally you won't need to store the access token in the database
			$table->string( 'access_token' )->nullable();

			$table->string( 'first_name' )->nullable();
			$table->string( 'last_name' )->nullable();
			$table->string( 'phone' )->nullable();
			$table->string( 'address' )->nullable();
			$table->string( 'postal', 5 )->nullable();
			$table->string( 'city' )->nullable();
			$table->date( 'birthday' )->nullable();
			$table->boolean( 'privacy_agreement' )->default( 0 )->nullable();
			$table->boolean( 'contact_post' )->default( 0 )->nullable();
			$table->boolean( 'contact_email' )->default( 0 )->nullable();

			$table->integer( 'tenant_id' )->unsigned()->nullable();
			$table->foreign( 'tenant_id' )
			      ->references( 'id' )->on( 'tenants' )
			      ->onDelete( 'cascade' );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn(
				'fb_id',
				'access_token',
				'first_name',
				'last_name'
			);
		});
	}

}
