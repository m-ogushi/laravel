<?php

namespace App\Eloquents\Mysql;
use update;

class AttendanceList extends Mysql
{
    protected $table = 'attendancelist';

     static function decideMenber($already)
     {
         $query = self::take(1)->orderByRaw('RAND()');
         if( $already == 1 ){
             return $query->where( 'end', 0 )->get();
         }
         return $query->get();
     }


     static function confirmMember($id)
     {
         //現在実装中
         Self::where('id','=',$id)->update(['end'=>1]);
     }
    
    
     static function resetMember()
     {
         //現在実装中
         Self::where('end', "<>" ,0)->update( ['end'=>0] );
     }
}
