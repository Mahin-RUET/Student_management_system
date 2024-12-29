<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;



class AcademicYearController extends Controller
{
    public function index()
    {
        return view('admin.academic_year');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        try {
            $data = new AcademicYear();
            $data->name = $request->name;
            $data->save();
    
            return redirect()->route('academic-year.create')->with('success', 'Academic year added successfully!')->withInput();

        } catch (\Exception $e) {
            return redirect()->route('academic-year.create')->with('error', 'Failed to add academic year. Please try again.');
        }
    }
    

    public function read(){
        $data['academic_year'] = AcademicYear::get();  // Get all academic years
        return view('admin.academic_year_list',$data); // Dump and die to see the result
    }
    
    public function delete($id) {
        $data = AcademicYear::find($id);
    
        if ($data) { // Check if the record exists
            $data->delete(); // Delete the record
            return redirect()->route('academic-year.read')->with('success', 'Academic year deleted successfully!');
        }
    
        return redirect()->route('academic-year.read')->with('error', 'Academic year not found!');
    }
    public function edit($id){
        $data['academic_year']=AcademicYear::find($id);
        return view('admin.edit_academic_year',$data);
    }
    public function update(Request $request){
        $data =AcademicYear::find($request->id);
        $data->name=$request->name;
        $data->update();
        return redirect()->route('academic-year.read')->with('success', 'Academic year updated successfully!');

    }
    
}
