<?php
namespace App\Eloquents\Mysql;

use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use Notifiable;

    protected $table = 'login';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
