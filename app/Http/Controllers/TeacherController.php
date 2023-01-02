<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function teacherAll(){
        $teachers = Teacher::latest()->get();
        return response()->json($teachers);
    }

    public function teacherAdd(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'institute_name' => 'required',
        ]);
        $teacher = Teacher::teacherUpdateOrCreate($request);
        return response()->json($teacher);
    }

    public function teacherEdit(Request $request){
        $teacher = Teacher::find($request->id);
        return response()->json( $teacher);
    }

    public function teacherUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'institute_name' => 'required',
        ]);
        $id = $request->id;
        $teacher = Teacher::teacherUpdateOrCreate($request, $id);
        return response()->json($teacher);
    }

    public function teacherDelete($id){
        $teacher = Teacher::find($id)->delete();
        return response()->json($teacher);
    }







}
