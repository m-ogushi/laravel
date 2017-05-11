<?php
namespace App\Http\Controllers\Web;

#use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
       // echo "test";
        $users = DB::select('select * from attendancelist');
        var_dump($users);
        return view('index', ['users' => $users]);
        self::isNotLoginRedirect();

        return view( 'index', [] );
        echo "test";
        //$users = DB::select('select * from attendancelist');
        $user = DB::table('attendancelist')->count();
        var_dump($user);
    }
}
