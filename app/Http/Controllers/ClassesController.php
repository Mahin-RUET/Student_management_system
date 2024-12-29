<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('admin.class.class');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
        ]);
    
        try {
            $data = new Classes();
            $data->name = $request->name;
            $data->save();
    
            return redirect()->route('class.create')->with('success', 'class added successfully!')->withInput();

        } catch (\Exception $e) {
            return redirect()->route('class.create')->with('error', 'Failed to add Class. Please try again.');
        }
    }
    public function read(){
        $data['class'] = Classes::get();  // Get all academic years
        return view('admin.class.class_list',$data); // Dump and die to see the result
    }
    public function edit($id){
        $data['class']=Classes::find($id);
        return view('admin.class.edit_class',$data);
    }
    public function update(Request $request){
        $data =Classes::find($request->id);
        $data->name=$request->name;
        $data->update();
        return redirect()->route('class.read')->with('success', 'Class updated successfully!');

    }
    public function delete($id) {
        $data = Classes::find($id);
    
        if ($data) { // Check if the record exists
            $data->delete(); // Delete the record
            return redirect()->route('class.read')->with('success', 'Class deleted successfully!');
        }
    
        return redirect()->route('class.read')->with('error', 'Class year not found!');
    }
}
