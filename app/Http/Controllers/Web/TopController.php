<?php
namespace App\Http\Controllers\Web;

#use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Eloquents\Mysql\AttendanceList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as CommonController;

class TopController extends CommonController
{ /** * コンストラクタ *
     * @param void
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index( Request $request )
    {
        // ログインチェック
        self::isNotLoginRedirect();

        return view( 'index', [] );
    }
    public function selectMember(Request $request)
    {
        if( null !== $request->input('already') )
        {
            $already = $request->input('already');
            echo $already;
            $users =  AttendanceList::decideMenber($already); 
            return view('select', ['users' => $users]);
        }
        return view('select');
    }
    public function updateMember(Request $request)
    {
        //現在実装中
        $input = $request->all(); 
        if( $request->input('memberId') == NULL )
        {
            AttendanceList::resetMember();
            return redirect( '/' );

        }
        $id = $request->input('memberId');
        var_dump( $id );
        $users =  AttendanceList::confirmMember($id);
        var_dump( $input );
        return redirect( 'member/select' )->with('status', $request->input('membername'));
    } 
}
