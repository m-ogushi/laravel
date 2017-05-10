<?php
namespace App\Http\Controllers\Web;

#use Illuminate\Support\Facades\Auth;
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
}
