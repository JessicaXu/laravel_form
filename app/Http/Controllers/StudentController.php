<?php

namespace App\Http\Controllers;

use App\Student;

class StudentController extends Controller
{
    // 学生列表页
    public function index()
    {
        // 查询所有数据，并进行分页(参数是pagesize)
        $students = Student::paginate(4);

        // 注意这里的传参数方式
        return view('student.index', [
            'students' => $students
        ]);
    }

    // 新建学生页
    public function create(){
        return view('student.create');
    }

}