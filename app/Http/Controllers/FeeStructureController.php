<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\AcademicYear;
use App\Http\Controllers\FreeStructure;

use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function index()
    {
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();
        
        return view('admin.fee-structure.fee-structure', $data);
        
    }
    public function store(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'academic_year_id' => 'required|exists:academic_years,id',
        'class_id' => 'required|exists:classes,id',
        'fee_head_id' => 'required|exists:fee_heads,id',
 
    ]);
    
    // Create the FeeStructure entry with validated data
    FeeStructure::create($request->all());
   
    // Redirect to the fee structure create page with success message
    return redirect()->route('fee-structure.create')->with('success', 'Fee structure added successfully!');
}
public function read(Request $request){
    $feeStructure=FeeStructure::query()->with(['FeeHead','AcademicYear','Classes'])->latest();
    If($request->filled('class_id')){
        $feeStructure->where('class_id',$request->get('class_id'));
    }
    If($request->filled('academic_year_id')){
        $feeStructure->where('academic_year_id',$request->get('academic_year_id'));
    }
    $data['feeStructure']=$feeStructure->get();
    $data['classes']= Classes::all();
    $data['academic_years']=AcademicYear::all();
    return view('admin.fee-structure.fee-structure_list',$data);
} 
public function delete($id) {
    $data = FeeStructure::find($id);

    if ($data) { // Check if the record exists
        $data->delete(); // Delete the record
        return redirect()->route('fee-structure.read')->with('success', 'Fee deleted successfully!');
    }

    return redirect()->route('fee-structure.read')->with('error', 'Fee year not found!');
}
public function edit($id){
    $data['fee']=FeeStructure::find($id);
    $data['classes'] = Classes::all();
    $data['academic_years'] = AcademicYear::all();
    $data['fee_heads'] = FeeHead::all();
    return view('admin.fee-structure.edit-fee-structure',$data);
}
public function update(Request $request,$id){
    $fee=FeeStructure::find($id);
    $fee->class_id=$request->class_id;
    $fee->academic_year_id =$request->academic_year_id ;
    $fee->fee_head_id =$request->fee_head_id ;
    $fee->april=$request->april;
    $fee->may=$request->may;
    $fee->june=$request->june;
    $fee->july=$request->july;
    $fee->august=$request->august;
    $fee->september=$request->september;
    $fee->october=$request->october;
    $fee->november=$request->november;
    $fee->december=$request->december;
    $fee->january=$request->january;
    $fee->february=$request->february;
    $fee->march=$request->march;
    $fee->update();
     return redirect()->route('fee-structure.read')->with('success', 'Fee Updated successfully!');
}
}