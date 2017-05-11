<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index()
  {
    //  return 'Hello world';
   return view('test_twig');
  }
  
  public function name($userName)
  {
  $urname = "ogushi";
   return view('testname',compact('urname'));
  }
}
