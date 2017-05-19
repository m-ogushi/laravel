<?php

namespace App\Eloquents\Mysql;

class AttendanceList extends Mysql
{
    protected $table = 'attendancelist';

     static function decideMenber( $already )
     {
         $query = self::take(1)->orderByRaw( 'RAND()' );
         if( $already == 1 ){
             return $query->where( 'end', 0 )->get();
         }
         return $query->get();
     }


     static function confirmMember( $id,$cancel )
     {
         if( $cancel == 1 )
         {
             Self::where( 'id','=',$id )->decrement( 'end',1 );
         }else
         {
             Self::where( 'id','=',$id )->increment( 'end',1 );
         }
     }
    
    
     static function resetMember()
     {
         //現在実装中
         Self::where( 'end', "<>" ,0 )->update( [ 'end'=>0 ] );
     }
}
