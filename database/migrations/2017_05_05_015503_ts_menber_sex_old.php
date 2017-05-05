<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TsMenberSexOld extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('ts')) 
        {
            Schema::table('ts', function($table)
            {
                $table->integer('sex')->nullable();
                $table->integer('old')->nullable();
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
        if(Schema::hasColumn('ts','sex'))
        {
            Schema::table('ts', function($table)
            {
                $table->dropColumn('sex');
            });
        }
        if(Schema::hasColumn('ts','old'))
        {
            Schema::table('ts', function($table)
            {
                $table->dropColumn('old');
            });
        }
    }
}
