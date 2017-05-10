<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( Schema::hasTable( 'login' ) )
        {
            Schema::table( 'login', function( $table )
            {
                if ( !( Schema::hasColumn( 'login', 'regist_user_id' ) ) )
                {
                    $table->integer( 'regist_user_id' )->nullable();
                }
                if ( !( Schema::hasColumn( 'login', 'update_user_id' ) ) )
                {
                    $table->integer( 'update_user_id' )->nullable();
                }
                if ( !( Schema::hasColumn( 'login', 'regist_date' ) ) )
                {
                    $table->dateTime( 'regist_date' )->nullable();
                }
                if ( !( Schema::hasColumn( 'login', 'update_date' ) ) )
                {
                    $table->dateTime( 'update_date' )->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ( Schema::hasTable( 'login' ) )
        {
            Schema::table( 'login', function( $table )
            {
                if ( ( Schema::hasColumn( 'login', 'regist_user_id' ) ) )
                {
                    $table->dropColumn( 'regist_user_id' );
                }
                if ( ( Schema::hasColumn( 'login', 'update_user_id' ) ) )
                {
                    $table->dropColumn( 'update_user_id' );
                }
                if ( ( Schema::hasColumn( 'login', 'regist_date' ) ) )
                {
                    $table->dropColumn( 'regist_date' );
                }
                if ( ( Schema::hasColumn( 'login', 'update_date' ) ) )
                {
                    $table->dropColumn( 'update_date' );
                }
            });
        }
    }
}
