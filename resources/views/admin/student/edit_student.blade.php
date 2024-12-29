@extends('admin.layout')
@section('content')
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Update Student  </h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href=""{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Update student</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
      <div class="container-fluid">
          <div class="row">

              <div class="col-md-12">

                  <div class="card card-primary">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                
                      <div class="card-header">
                          <h3 class="card-title">Add Student </h3>
                      </div>


                      <form action="{{route('student.update',$students->id)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label> Select Class</label>
                                    <select name="class_id" class="form-control">
                                        <option value="" disabled selected>Select class</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" @selected(isset($students) && $class->id == $students->class_id)>
                                            {{ $class->name }}
                                        </option>
                                        
                                         @endforeach
                                    </select>
                                    
                                    @error('class_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-md-3">
                                    <label> Select Academic Year</label>
                                    <select name="academic_year_id" class="form-control">
                                        @foreach ($academic_years as $academic_year)
                                        <option 
                                        value="{{ $academic_year->id }}" 
                                        {{ isset($students) && $academic_year->id == $students->academic_year_id ? 'selected' : '' }}>
                                        {{ $academic_year->name }}
                                    </option>
                                        @endforeach
                                    </select>
                                    @error('academic_year_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Student Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail" placeholder="Enter Student's Name" value="{{old('name',$students->name)}}">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Student's Father Name</label>
                                        <input type="text" name="father_name" class="form-control" id="exampleInputEmail" placeholder="Enter Student's Fatehr Name" value="{{old('father_name',$students->father_name)}}">
                                        @error('father_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Student's Mother name</label>
                                        <input type="text" name="mother_name" class="form-control" id="exampleInputEmail" placeholder="Enter Student's Mother Name" value="{{old('mother_name',$students->mother_name)}}">
                                        @error('mother_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="exampleInputEmail" value="{{old('dob',$students->dob)}}">
                                        @error('dob')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Mobile Number </label>
                                        <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail" placeholder="Enter Mobile Number" value="{{old('mobile_number',$students->mobile_number)}}">
                                        @error('mobile_number')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Enter Email Address </label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email Address" value="{{old('email',$students->email)}}">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="col-md-4">
                                   
                                </div>   
                                
                            </div>     
                            </div>
                            
                            </div>
                              
                              
                          </div>

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Update Student  </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

      </div>
  </section>

</div>
@endsection
