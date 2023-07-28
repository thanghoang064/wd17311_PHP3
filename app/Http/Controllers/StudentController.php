<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function Spatie\Ignition\Solutions\OpenAi\file;

class StudentController extends Controller
{
    //
    public function index(Request $request) {
        // chan o day
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $title = "hello";
        $name = "thanghq12";
        // khi tồn tại  là post

        //lấy toàn bộ dữ liệu bảng student (select * from students)
        //c1
//        $students = DB::table('students')
//            ->select('id','name','image') // lấy theo những trường mong muốn
//            ->whereNull('deleted_at')
//            ->get();
        //c2
        $students = Student::all();
        if ($request->post() && $request->email) {
            // ấn vào thì nhảy vào đây

            $students = DB::table('students')
                ->select('id','name') // lấy theo những trường mong muốn
                ->where('name','like','%'.$request->email.'%')
                ->get();
        }
//        $studentCondition = DB::table('students')
//            ->where('id','>=',1)
//            ->where('id','<=',5) // lấy theo điều kiện id >=1 và id <=5
//            ->orWhere('email','=','kulas.estefania@example.com')
//            //orWhere là hoặc
//            // where là và
//            ->get();
//        //trả về 1 dòng dữ liệu
//        $student = DB::table('students')->where('id','=',1)->first();

        //
        return view('student.index',compact('title','name','students'));
    }
    public function add(TestRequest $request) {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            // nếu như tồn file post lên
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('hinh',$request->file('image'));
            }
            $student = Student::create($params);

            if ($student->id) {
                Session::flash('success','Thêm mới thành công sinh viên');
                return redirect()->route('route_student_add');
            }
        }
        return view('student.add');
    }
    public function edit(TestRequest $request,$id) {
        //c1 DB query
//        $student = DB::table('students')
//            ->where('id','=',$id)
//            ->first();
        //c2 dungf model
        $student = Student::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // xóa ảnh cũ
                $resultDL = Storage::delete('/public/'.$student->image);
                if ($resultDL) {
                    $params['image'] = uploadFile('hinh',$request->file('image'));
                }
            } else {
                $params['image'] = $student->image;
            }

            $result = Student::where('id',$id)
                ->update($params);
            if ($result) {
                Session::flash('success','Sua thành công sinh viên');
                return redirect()->route('route_student_edit',['id'=>$id]);
            }
        }
       return view('student.edit',compact('student'));

    }
    public function delete($id) {
        Student::where('id',$id)->delete();
        Session::flash('success','Xóa thành công sinh viên có id là'.$id);
        return redirect()->route('route_student_index');
    }
}
