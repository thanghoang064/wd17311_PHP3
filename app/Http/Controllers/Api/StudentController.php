<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
          'limit'=>'required',
          'offset'=>'required'
//            'email'=>'required'
        ]);
        if ($validator->fails()) {
            //dùng status của http code
            return response()->json([
//                'status'=>'fails',
                'errors' => $validator->errors()->toArray()
            ],400);

        }
        //viết API hiển thị danh sách sinh viên theo limit offset (limit offset bắt buộc phải có param)
        // nếu tồn tại param name thì sẽ search theo tên , nếu tồn tại param email thì sẽ search theo
        // param email nếu vừa tồn tại param name và vừa tồn tại param email thì sẽ search theo cả 2
        // nếu không tồn tại param nào thì chỉ lấy danh sách sinh viên theo limit và offest
        $query = DB::table('students');
        if ($request->name) {
            $query->where('name','LIKE','%'.$request->name.'%');
        }
        if ($request->email) {
            $query->where('email','LIKE','%'.$request->email.'%');
        }

        $dataStudent = $query->limit($request->limit)
            ->offset($request->offset)
            ->get();
        return response()->json([
//            'status'=> 'success',
            'students' =>$dataStudent
        ],200);
        // tự tạo 1 bảng product id,name,price,color
        // viết 1 api có tên  product truyền lên những param bắt buộc sau offset,limit (validate)
        // nếu  có 1 cái param :type
        // nếu như type : price
        // bắt buộc truyền lên truyền lên param priceMin,priceMax và lọc theo giá trong khoảng
        // nếu như type : color
        // bắt buộc truyền lên param color và color này phải lọc được nhiều màu
        //nếu như type : name
        // bắt buộc truyền lên param name và tìm gần đúng theo tên
        // còn nếu ko có param type thì thôi lấy danh sách sản phẩm theo offset, limit

    }
}
