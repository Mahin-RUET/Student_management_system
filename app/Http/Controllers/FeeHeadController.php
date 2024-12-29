<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fee-head.fee-head');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
        ]);
    
        try {
            $data = new FeeHead();
            $data->name = $request->name;
            $data->save();
    
            return redirect()->route('fee-head.create')->with('success', 'class added successfully!')->withInput();

        } catch (\Exception $e) {
            return redirect()->route('fee-head.create')->with('error', 'Failed to add Class. Please try again.');
        }
    }
    public function read(){
        $data['fee'] = FeeHead::get();  // Get all academic years
        return view('admin.fee-head.fee-head_list',$data); // Dump and die to see the result
    }
    public function edit($id){
        $data['fee']=FeeHead::find($id);
        return view('admin.fee-head.edit-fee-head',$data);
    }
    public function update(Request $request){
        $data =FeeHead::find($request->id);
        $data->name=$request->name;
        $data->update();
        return redirect()->route('fee-head.read')->with('success', 'Fee updated successfully!');

    }
    public function delete($id) {
        $data = FeeHead::find($id);
    
        if ($data) { // Check if the record exists
            $data->delete(); // Delete the record
            return redirect()->route('fee-head.read')->with('success', 'Fee name  deleted successfully!');
        }
    
        return redirect()->route('fee-head.read')->with('error', 'Fee name not found!');
    }
}


