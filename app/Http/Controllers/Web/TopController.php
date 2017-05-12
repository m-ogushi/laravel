<?php
namespace App\Http\Controllers\Web;

#use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Eloquents\Mysql\Attendancelist;
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
        $users =  Attendancelist::get_data();                               
       
        return view('index', ['users' => $users]);
        // ログインチェック
        self::isNotLoginRedirect();

        return view( 'index', [] );
        echo "test";
        //$users = DB::select('select * from attendancelist');
        $user = DB::table('attendancelist')->count();
        var_dump($user);
    }
}
