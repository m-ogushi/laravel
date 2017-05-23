<?php
namespace App\Http\Controllers\Web\Authority;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as CommonController;

class AuthController extends CommonController
{
    const SESSID = 'auth_redirect_url';

            // バリデーションのルール
    public $validateRules = [
        'alpha_num'=>'alpha_num_check',
    ];
    public $validateMessages = [
        'alpha_check'=>'半角英字で入力してください。',
        'alpha_num_check'=>'半角英数字で入力してください。',
        'alpha_dash_check'=>'半角英数字と-_で入力してください。'
    ];
    public function signIn( Request $request )
    {
        // ログインチェック
        self::isLoginRedirect();

        $mode = $request->input( 'mode' );

        $message = NULL;
        if ( $mode == 'login' )
        {
            $validatorempty = Validator::make($request->all(), 
            [
                'name' => 'required',
                'password' => 'required',
            ]);

            $validatormuch = Validator::make($request->all(), 
            [
                'name' => 'max:50',
                'password' => 'max:50',
            ]);

            if ($validatorempty->fails()) 
            {
                $message = "ユーザ名とパスワードを入力してください";
            }
            else if ($validatormuch->fails())
            {
                $message = "50文字以下で入力してください";
            }

            /*$validatorhalfwidth = Validator::make($request->all(), 
            [
                'alpha_num_check' => trim($request->get('alpha_num_check')),           
            ]
            );
            if ($validatorhalfwidth->fails()) 
            {
                echo "半角で入れて";
            }
            logger($validatorhalfwidth); 
            */
            if ( self::login( $request->all() ) )
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
