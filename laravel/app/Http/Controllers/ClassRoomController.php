<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassRoomController extends Controller
{
    public function index(){
        $level_classes  = $this->fetchAllLevel();
        $teachers       = $this->fetchAllTeacher();
        $classroom      = $this->fetchAll();
        return view('add.classroom' ,[
            'level_classes' => $level_classes,
            'teachers'      => $teachers,
            'classroom'     => $classroom
        ]);
    }
    public function fetchAllLevel(){
        $level_classes = DB::table('level_classes')->orderBy('created_at','desc')->get();
        return $level_classes;
    }
    public function fetchAllTeacher(){
        $teachers = DB::table('teachers')->orderBy('created_at','desc')->get();
        return $teachers;
    }
    public function fetchAll(){
        $classrooom = DB::table('class_rooms')->select('*')
        ->join('level_classes as r1','class_rooms.classroom_level_id' , '=' , 'r1.id')
        ->join('teachers as r2','class_rooms.classroom_teacher_id' , '=' , 'r2.id')
        ->paginate(10);
        return $classrooom;
    }
    public function saveClassroom(Request $request){
        $request->validate([
            'class_id'              => 'required',
            'classroom_name'        => 'required',
            'classroom_level_id'    => 'required',
            'classroom_teacher_id'  => 'required',
            'classroom_desc'        => 'required',
            'classroom_status'      => 'required'
        ]);
            ClassRoom::create($request->all());
            return redirect()->back()->with('success' , '1');

    }
    public function editClassroom($id){
        $classroom = ClassRoom::find($id);
        return view('edit.classroom', ['classroom' => $classroom]);
    }
}
