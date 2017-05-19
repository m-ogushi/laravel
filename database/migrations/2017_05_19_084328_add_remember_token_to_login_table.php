<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRememberTokenToLoginTable extends Migration
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
                if ( !( Schema::hasColumn( 'login', 'remember_token' ) ) )
                {
                    $table->rememberToken();
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
            });
        }
    }
}
