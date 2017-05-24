<?php
namespace App\Http\Controllers\Web\Authority;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as CommonController;

class AuthController extends CommonController
{
    const SESSID = 'auth_redirect_url';

    public function signIn( Request $request )
    {
        // ログインチェック
        self::isLoginRedirect();

        $mode = $request->input( 'mode' );

        $message = NULL;
        if ( $mode == 'login' )
        {
            $validatorempty = Validator::make( $request->all(), 
            [
                'name' => 'required',
                'password' => 'required',
            ]);

            $validatormuch = Validator::make( $request->all(), 
            [
                'name' => 'max:50',
                'password' => 'max:50',
            ]);

            $validatorhalfwidth = Validator::make( $request->all(), 
            [
                'name' => 'alnum',           
            ]);

            if ( $validatorempty->fails() ) 
            {
                $message = "ユーザ名とパスワードを入力してください";
            }
            else if ( $validatormuch->fails() )
            {
                $message = "50文字以下で入力してください";
            }
            else if ( $validatorhalfwidth->fails() ) 
            {
                $message = "ユーザ名は半角英数字で入力してください";
            }
            
            else if ( self::login( $request->all() ) )
            {
                $url = $request->session()->has( self::SESSID ) ?
                urldecode( $request->session()->get( self::SESSID ) ) : '/';
                $request->session()->forget( self::SESSID );
                return redirect( $url );
            }
            if ( !isset( $message ) )
            {
                $message = "メールアドレス又はパスワードが間違っています";
            }
        }
        else
        {
            $request->session()->put( self::SESSID, $request->input( 'r' ) );
        }

        return view( 'login',
                     [
                         'time'    => time(),
                         'message' => $message,
                     ]
                   );
    }


    public function signOut()
    {
        self::logout();
        return redirect( 'login' );
    }
}
