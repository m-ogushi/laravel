<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attendencelist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('attendencelist')))
        {
            Schema::create('attendencelist', function (Blueprint $table) {
                if(!(Schema::hasColumn('attendencelist','id')))
                {
                    $table->increments('id');
                }
                if(!(Schema::hasColumn('attendencelist','name')))
                {
                    $table->string('name',64);
                }
                if(!(Schema::hasColumn('attendencelist','section')))
                {
                    $table->addColumn('tinyInteger', 'section', ['lenght' => 4]);
                    //$table->tinyInteger('section',4,$autoIncrement = false, $unsigned = false);
                }

                if(!(Schema::hasColumn('attendencelist','end')))
                {
                    $table->char('end',1)->default(0);
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
        if(Schema::hasTable('attendencelist'))
        {
            Schema::drop('attendencelist');
        }
    }
}
