<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function addTeacher(){
        $teacher = Teacher::query()->orderBy('created_at','desc')->paginate(10);
        return view('add.teacher' , ['teacher' =>  $teacher ]);
    }
    public function saveTeacher(Request $request){
        $request->validate([
            'teacher_name'          => 'required',
            'teacher_lastname'      => 'required',
            'teacher_qualification' => 'required',
            'teacher_status'        => 'required',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imagePath = $request->file('image')->store('img', 'public');
        Teacher::create([
            'teacher_name'          => $request->input('teacher_name'),
            'teacher_lastname'      => $request->input('teacher_lastname'),
            'teacher_qualification' => $request->input('teacher_qualification'),
            'teacher_status'        => $request->input('teacher_status'),
            'image'                 => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
    public function edit($id){
        $teacher = Teacher::find($id);
        $arr = array(
            'test1' =>'lorem1',
            'test2' =>'lorem2'
        );
        return view('edit.teacher',['teacher'=>$teacher , 'test' =>$arr]);
    }
    public function update(Request $request , $id){
        $teacher = Teacher::find($id);
        try {

            if($request->file('image')):
                $imagePath = $request->file('image')->store('img', 'public');
                $teacher->update([
                    'teacher_name'          => $request->input('teacher_name'),
                    'teacher_lastname'      => $request->input('teacher_lastname'),
                    'teacher_qualification' => $request->input('teacher_qualification'),
                    'teacher_status'        => $request->input('teacher_status'),
                    'image'                 => $imagePath
                ]);
            else:
                $teacher->update($request->all());
            endif;
            return redirect()->route('addTeacher')->with('update','1');
        } catch (\Exception $err) {
            return redirect()->route('addTeacher')->with('update','2');
        }
    }
    public function delete($id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->back()->with('delete' , 'delete success');
    }
}
