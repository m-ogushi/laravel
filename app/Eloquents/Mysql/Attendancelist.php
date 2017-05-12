<?php

namespace App\Eloquents\Mysql;

use Illuminate\Support\Facades\DB;

class Attendancelist extends Mysql
{
    protected $table = 'attendancelist';

    static function get_data()
    {
      $users = DB::select('select * from attendancelist');
      return $users;
    }
}
