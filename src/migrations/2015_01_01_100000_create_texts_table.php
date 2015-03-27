<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string( 'brand_title' );
            $table->text( 'permission_denied' );

            $table->string( 'headline' )->default( 'So geht’s' );
            $table->string( 'subline' );
            $table->text( 'leading_copy' );
            $table->text( 'copy' );

            $table->text( 'call_to_action' );

            $table->text('terms_of_use');
            $table->text('privacy_policy');

            $table->string('share_message', 255);

            $table->string( 'fan_gate_title' )->default( 'Werde Fan und spiel mit!' );
            $table->text( 'fan_gate_body' );

            $table->integer('tenant_id')->unsigned()->nullable();
            $table->foreign('tenant_id')
                ->references('id')->on('tenants')
                ->onDelete('cascade');

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
        Schema::drop('texts');
    }

}
