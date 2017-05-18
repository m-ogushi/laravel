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
     *
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
    public function selectMember( )
    {
        $users =  AttendanceList::decideMenber();                               
        return view('select', ['users' => $users]);
    }
    public function updateMember( Request $request){
        //現在実装中
        $input = $request->all(); 
        $id = $request->input('memberId');
        var_dump($input);
        $users =  AttendanceList::confirmMember($id);                               
    } 
}
