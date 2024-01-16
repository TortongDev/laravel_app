<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubject(){
        $fetchAllSubject = Subject::query()->orderBy('created_at', 'desc')->paginate(10);
        return view('add.subject', ['subject' => $fetchAllSubject] );
    }
    public function saveSchool(Request $request){
        $request->validate([
            'subject_name' => 'required',
            'subject_type' => 'required',
            'subject_status' => 'required'
        ]);
       try {
            Subject::create([
                'subject_name'      => $request->input('subject_name'),
                'subject_type'      => $request->input('subject_type'),
                'subject_desc'      => $request->input('subject_desc'),
                'subject_status'    => $request->input('subject_status')
            ]);
            return redirect()->route('addSubject')->with('success','Insert Success.');
       } catch (\Throwable $err) {
            return redirect()->route('addSubject')->with('error','Insert Error.'.$err);
       }
    }
    public function delete($id){
        $subject = Subject::find($id);
        try {
            $subject->delete();
            return redirect()->route('addSubject')->with('status_delete_true','1');
        } catch (\Throwable $th) {
            return redirect()->route('addSubject')->with('status_delete_false','2');
        }
    }
    public function edit($id){
        try {
            $subject = Subject::find($id);
            return view('edit.subject' , ['subject' => $subject]);
        } catch (\Throwable $err) {
            return redirect()->route('addSubject')->with('status_edit','False');
        }
    }
    public function update(Request $request , $id){
        $subject = Subject::find($id);
        try {
            $subject->update($request->all());
            return redirect()->route('addSubject')->with('status_update','1');
        } catch (\Throwable $err) {
            return redirect()->route('addSubject')->with('status_update','2');
        }

    }
}
