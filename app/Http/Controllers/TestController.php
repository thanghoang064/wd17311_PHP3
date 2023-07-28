<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index(Request $request) {

       $title = "hello";
       $name = "dinhtv7";
       $students = DB::table('students')->get();
       // an vao tim kiem
       if($request->post() && $request->abc){

         $students  = DB::table('students')
             ->where('id','=',$request->abc)
             ->get();
       } // toonf tai action poss {
       return view('test.index',compact('title','name','students'));
    }
}
