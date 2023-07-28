<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function student(Request $request) {
//        return response()->json([[
//            'name'=>"Phạm việt đức",
//            'diem'=>0,
//            'tuoi'=>20
//        ],[
//            'name'=>"Phạm việt đức",
//            'diem'=>0,
//            'tuoi'=>20
//        ]]);
//        $dataStudent = [
//            [
//                'name'=>"Phạm việt đức",
//                'diem'=>0,
//                'tuoi'=>20
//            ],
//            [
//                'name'=>"Phạm việt đức",
//                'diem'=>0,
//                'tuoi'=>20
//            ]
//        ];
        // api truyền vào param để search theo tên
//        dd($request->name);
        // viết truy vấn search gần đúng theo tên
        // validate request API
        //status là 1 dạng chuẩn chung quy đinh giữa frontend và backend
        //status fails | success
        $validator = Validator::make($request->all(),[
           'name'=>'required|string',
//            'email'=>'required'
        ]);
        if ($validator->fails()) {
            //dùng status của http code
            return response()->json([
//                'status'=>'fails',
                'errors' => $validator->errors()->toArray()
            ],400);

        }
        //
        $dataStudent = Student::where('name','LIKE','%'.$request->name.'%')->get();
//        $dataStudent = Student::all();
        return response()->json([
//            'status'=> 'success',
            'students' =>$dataStudent
        ],200);
    }
}
