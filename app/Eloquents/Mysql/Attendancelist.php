<?php

namespace App\Eloquents\Mysql;

class Attendancelist extends Mysql
{
    protected $table = 'attendancelist';

     static function get_data()
     {
         return self::get();
     }
}
