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
                if(!(Schema::hasColumn('ts','sex')))
                {
                    $table->integer('sex')->nullable();
                }
                if(!(Schema::hasColumn('ts','sex')))
                {
                    $table->integer('old')->nullable();
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
        if(Schema::hasTable('ts'))
        {
            Schema::table('ts', function($table)
            {          
                if(Schema::hasColumn('ts','sex'))
                {
                    $table->dropColumn('sex');
                }
                if(Schema::hasColumn('ts','old'))
                {
                    $table->dropColumn('old');
                }
            });
        }
    }
}
