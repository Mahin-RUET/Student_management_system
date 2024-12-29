<?php

namespace App\Http\Controllers;



use App\Models\AssaignSubjectToClass;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssaignSubjectToClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['classes']=Classes::all();
        $data['subjects']=Subject::all();
        return view("admin.assaign_subject.form");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssaignSubjectToClass $assaignSubjectToClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssaignSubjectToClass $assaignSubjectToClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssaignSubjectToClass $assaignSubjectToClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssaignSubjectToClass $assaignSubjectToClass)
    {
        //
    }
}
