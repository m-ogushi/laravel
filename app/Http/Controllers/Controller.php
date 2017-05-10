<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
    *  コンストラクタ
    */
    public function __construct()
    {
    }


    /**
     * ログイン
     *
     * @param array $data
     * @return bool
     */
    protected static function login( $data )
    {
        return Auth::attempt(
                   [
                       'name'     => $data['name'],
                       'password' => $data['password']
                   ]
               );
    }


    /**
     * ログアウト
     *
     * @param void
     * @return bool
     */
    protected static function logout()
    {
        Auth::logout();
    }


    /**
     * ログインチェック
     *
     * @param void
     * @return bool
     */
    protected static function isLogin()
    {
        return Auth::check();
    }


    /**
     * ログインチェック&リダイレクト
     * ログインしていない場合ログインページへリダイレクトさせる
     *
     * @param void
     * @return void
     */
    protected static function isNotLoginRedirect()
    {
        if ( !self::isLogin() )
        {
            header( 'location: /login/?r=' . urlencode( $_SERVER['REQUEST_URI'] ) );
            exit;
        }
    }


    /**
     * ログインチェック&リダイレクト
     * ログインしている場合TOPページへリダイレクトさせる
     *
     * @param void
     * @return void
     */
    protected static function isLoginRedirect()
    {
        if ( self::isLogin() )
        {
            return redirect( '/' );
        }
    }
}
