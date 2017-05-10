<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAttendancelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( Schema::hasTable( 'attendencelist' ) )
        {
            Schema::rename( 'attendencelist', 'attendancelist' );
        }

        if ( Schema::hasTable( 'attendancelist' ) )
        {
            Schema::table( 'attendancelist', function( $table )
            {
                if ( !( Schema::hasColumn( 'attendancelist', 'regist_user_id' ) ) )
                {
                    $table->integer( 'regist_user_id' )->nullable();
                }
                if ( !( Schema::hasColumn( 'attendancelist', 'update_user_id' ) ) )
                {
                    $table->integer( 'update_user_id' )->nullable();
                }
                if ( !( Schema::hasColumn( 'attendancelist', 'regist_date' ) ) )
                {
                    $table->dateTime( 'regist_date' )->nullable();
                }
                if ( !( Schema::hasColumn( 'attendancelist', 'update_date' ) ) )
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
        if ( Schema::hasTable( 'attendancelist' ) )
        {   
            Schema::table( 'attendancelist', function( $table )
            {   
                if ( ( Schema::hasColumn( 'attendancelist', 'regist_user_id' ) ) )
                {   
                    $table->dropColumn( 'regist_user_id' );
                }
                if ( ( Schema::hasColumn( 'attendancelist', 'update_user_id' ) ) )
                {   
                    $table->dropColumn( 'update_user_id' );
                }
                if ( ( Schema::hasColumn( 'attendancelist', 'regist_date' ) ) )
                {   
                    $table->dropColumn( 'regist_date' );
                }
                if ( ( Schema::hasColumn( 'attendancelist', 'update_date' ) ) )
                {   
                    $table->dropColumn( 'update_date' );
                }
            });
        }
    }
}
