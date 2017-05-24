<?php
namespace App\Http\Controllers\Web;

#use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Eloquents\Mysql\AttendanceList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as CommonController;

class TopController extends CommonController
{
    /**
     * コンストラクタ
     * @param void
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index( Request $request )
    {
        if ( NULL !==  $request->input( 'logout' ) )
        {
            self::logout();
            return redirect( 'login' );
        }
        
        // ログインチェック
        self::isNotLoginRedirect();
        return view( 'index', [] );
    }
    public function selectMember( Request $request )
    {
        
        // ログインチェック
        self::isNotLoginRedirect();
        
        //抽選条件が選択されているかどうかで、抽選処理を行うかどうかを判断する
        if ( NULL !== $request->input( 'already' ) )
        {
            $already = $request->input( 'already' );
            $users =  AttendanceList::decideMenber( $already );
            
            if ( !( $users->count() ) )
            {
                //全員がスピーチ済でスピーチ者を決められない場合、その旨を表示する
                return redirect( '/' )->with( 'info', '全員がスピーチ済です' );
            } 
            return view( 'select', [ 'users' => $users, 'already' => $already ] );
        }
        else if ( NULL !== $request->session()->get( 'statusid' ) )
        { 
            return view( 'select' );
        }
        //想定していないアクセスをされた場合、トップページへ遷移する
        else
        {
            return redirect( '/' );
        }
    }
    public function updateMember( Request $request )
    {

        $input = $request->all(); 

        //「リセット」が押された後の処理
        if ( NULL == $request->input( 'memberId' ) )
        {
            AttendanceList::resetMember();
            return redirect( '/' )->with( 'endreset', 1 );
        }

        //「スピーチする」または「キャンセル」が押されたあとの処理
        $id = $request->input( 'memberId' );
        $cancel = $request->input( 'cancel' );
        
        /*
        cancelの値
        「スピーチする」が押された:0
        「キャンセル」が押された:1
        */
        $users =  AttendanceList::confirmMember( $id, $cancel );
        
        //「キャンセル」の場合、トップ画面に遷移する
        if ( $request->input( 'cancel' ) == 1 )
        {
            return redirect( '/' );
        }
        
        //「スピーチをする」の場合、キャンセルできるようにするために、セッションに氏名とID情報を保存する
        return redirect( 'member/select' )
        ->with( 'statusname', $request->input( 'membername' ) )
        ->with( 'statusid', $request->input( 'memberId' ) );
    } 
}
