<?php

namespace App\Eloquents\Mysql;

class AttendanceList extends Mysql
{
    protected $table = 'attendancelist';

     static function decideMenber()
     {
         return self::take(1)->orderByRaw('RAND()')->get();
     }


     static function confirmMember($id)
     {
         //return self::take(1)->orderByRaw('RAND()')->get();
         //Self::where('id','=',$id)->update(['end'=>1]);
     }
}
