<?php

namespace App\Eloquents\Mysql;

use Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class Mysql extends Model
{
    const CREATED_AT = 'regist_date';
    const UPDATED_AT = 'update_date';

    public $timestamps = TRUE;

    protected static function boot()
    {
        parent::boot();

        self::creating( function( $entity )
        {
            $entity->regist_user_id = Auth::id();
            $entity->update_user_id = Auth::id();
        });

        self::updating( function( $entity )
        {
            $entity->update_user_id = Auth::id();
        });
    }
}
