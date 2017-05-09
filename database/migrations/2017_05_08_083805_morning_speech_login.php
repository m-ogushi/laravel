<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MorningSpeechLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('login')))
        {
            Schema::create('login', function (Blueprint $table) {
                if(!(Schema::hasColumn('login','id')))
                {
                    $table->increments('id');
                }
                if(!(Schema::hasColumn('login','name')))
                {
                    $table->string('name',64)->unique();
                }
                if(!(Schema::hasColumn('login','password')))
                {
                    $table->string('password',256);
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
        if(Schema::hasTable('login'))
        {
            Schema::drop('login');
        }
    }
}
