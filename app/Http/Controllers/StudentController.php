<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        return view('admin.student.student',$data);
    }
    public function store(Request $request){
       $request->validate([
        'name'=>'required',
        'academic_year_id'=>'required',
        'class_id'=>'required',
        'father_name'=>'required',
        'mother_name'=>'required',
        'dob'=>'required',
        'email'=>'required',
        'mobile_number'=>'required',
        'admission_date'=>'required',
        'password'=>'required',      
       ]);
       $user=new User();
       $user->name = $request->name;
       $user->academic_year_id =$request->academic_year_id;
       $user->class_id =$request->class_id;
       $user->father_name =$request->father_name;
       $user->mother_name =$request->mother_name;
       $user->dob =$request->dob;
       $user->email =$request->email;
       $user->mobile_number =$request->mobile_number;
       $user->admission_date =$request->admission_date;
       $user->password =Hash::make($request->password);
       $user->role='student';
       $user->save();
       return redirect()->route('student.create')->with('success', 'New Student added successfully!');
    }
    public function read(Request $request){
        $query=User::with(['studentClass','studentAcademicYear'])->where('role','student')->latest('id');
        if($request->filled('academic_year_id')){
            $query->where('academic_year_id', $request->get('academic_year_id'));
        }
        if($request->filled('class_id')){
            $query->where('class_id', $request->get('class_id'));
        }
        $students =$query->get();
        $data['students']=$students;
        $data['academic_years']=AcademicYear::all();
        $data['classes']=Classes::all();
        
        
        return view('admin.student.student_list',$data);
    }
    public function delete($id) {
        $students = User::find($id);
    
        if ($students) { // Check if the record exists
            $students->delete(); // Delete the record
            return redirect()->route('student.read')->with('success', 'Student Id deleted successfully!');
        }
    
        return redirect()->route('student.read')->with('error', 'student not found!');
    }
    public function edit($id){
         
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['students'] = User::find($id);
        return view('admin.student.edit_student',$data);
    }
    public function update(Request $request,$id){
        $user=User::find($id);
       $user->name = $request->name;
       $user->academic_year_id =$request->academic_year_id;
       $user->class_id =$request->class_id;
       $user->father_name =$request->father_name;
       $user->mother_name =$request->mother_name;
       $user->dob =$request->dob;
       $user->email =$request->email;
       $user->mobile_number =$request->mobile_number;
       $user->admission_date =$request->admission_date;
       $user->password =Hash::make($request->password);
       $user->role='student';
       $user->update();
       return redirect()->route('student.read')->with('success', 'New Student Updated successfully!');
    }
    }
