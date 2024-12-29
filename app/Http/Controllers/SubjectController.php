<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subject.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
               $request->validate([
                     'name'=>'required',
                     'type'=>'required'

               ]);
       $subject =new Subject();
       $subject->name =$request->name;
       $subject->type =$request->type;
       $subject->save();
       return redirect()->route('subject.create')->with('success','Subject added successfully');
}

public function read(){
    $data['subjects']= Subject::latest()->get();
    return view('admin.subject.table',$data);
}

public function delete($id){
    $subject = Subject::find($id);
    $subject->delete();
    return redirect()->route('subject.read')->with('success','Subject Successfully deleted ');

}

public function edit( $id){
    $data['subjects']= Subject::latest()->get();
    return view('admin.subject.edit_subject',$data);
}
public function update(Request $request, $id){
    $subjects = Subject::find($id);
    $subjects->name = $request->name;
    $subjects->type =$request->type;
    $subjects->update();
    return redirect()->route('subject.read')->with('success','Subject Successfully Updated');
}

}
