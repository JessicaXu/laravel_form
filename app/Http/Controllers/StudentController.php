<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 学生列表页
    public function index()
    {
        // 查询所有数据，并进行分页(参数是pagesize)
        $students = Student::orderby('updated_at', 'desc') -> paginate(10);

        // 注意这里的传参数方式
        return view('student.index', [
            'students' => $students
        ]);
    }

    // 新建学生页
    public function create(Request $request){
        // 处理提交按钮的添加数据请求
        if($request->isMethod('POST')){
            // 验证数据合法性
            $this -> validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer'
            ]);

            $data = $request->input('Student');
            // create需要设置批量赋值
            if(Student::create($data)){
                return redirect(url('student/index')) -> with('success', '添加成功');
            }else{
                return redirect()->back() -> with('error', '添加失败');
            }
        }

        return view('student.create');
    }

    // 提交按钮
    public function save(Request $request){
        $data = $request->input('Student');
//        var_dump($data);

        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];

        if($student->save()){
            return redirect(url('student/index')) -> with('success', '添加成功');
        }else{
            return redirect()->back() -> with('error', '添加失败');
        }
    }
}