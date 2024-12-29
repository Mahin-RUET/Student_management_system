@extends('admin.layout')
@section('content')
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Fee Structure</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href=""{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Fee Structure</li>
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
                          <h3 class="card-title">Add Fee Structure </h3>
                      </div>


                      <form action="{{route('fee-structure.update',$fee->id)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label> Select Class</label>
                                    <select name="class_id" class="form-control">
                                        <option value="" disabled selected>Select class</option>
                                        @foreach ($classes as $class)
                                        <option 
                                        value="{{ $class->id }}" 
                                        {{ isset($fee) && $fee->class_id == $class->id ? 'selected' : '' }}>
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
                                        <option value="" disabled selected>Select Academic Year</option>
                                        @foreach ($academic_years as $academic_year)
                                        <option 
                                        value="{{ $academic_year->id }}" 
                                        {{ isset($fee) && $fee->academic_year_id == $academic_year->id ? 'selected' : '' }}>
                                        {{ $academic_year->name }}
                                    </option>
                                        @endforeach
                                    </select>
                                    @error('academic_year_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label> Select Fee Head</label>
                                    <select name="fee_head_id" class="form-control">
                                        <option value="" disabled selected>Select Fee head</option>
                                          @foreach ($fee_heads as $fee_head)
                                          <option 
                                          value="{{ $fee_head->id }}" 
                                          {{ isset($fee) && $fee->fee_head_id == $fee_head->id ? 'selected' : '' }}>
                                          {{ $fee_head->name }}
                                      </option>
                                          @endforeach
                                    </select>
                                    @error('fee_head_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                </div>
                            </div>
                        </div>
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="april_fee">April Fee</label>
                                        <input type="text" name="april" class="form-control" id="april_fee" placeholder="Enter April Fee" value="{{old('april',$fee->april)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="may_fee">May Fee</label>
                                        <input type="text" name="may" class="form-control" id="may_fee" placeholder="Enter May Fee" value="{{old('may',$fee->may)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="june_fee">June Fee</label>
                                        <input type="text" name="june" class="form-control" id="june_fee" placeholder="Enter June Fee" value="{{old('june',$fee->june)}}">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="july_fee">July Fee</label>
                                        <input type="text" name="july" class="form-control" id="july_fee" placeholder="Enter July Fee" value="{{old('july',$fee->july)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="august_fee">August Fee</label>
                                        <input type="text" name="august" class="form-control" id="august_fee" placeholder="Enter August Fee" value="{{old('august',$fee->august)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="september_fee">September Fee</label>
                                        <input type="text" name="september" class="form-control" id="september_fee" placeholder="Enter September Fee"value="{{old('september',$fee->september)}}">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="october_fee">October Fee</label>
                                        <input type="text" name="october" class="form-control" id="october_fee" placeholder="Enter October Fee"value="{{old('october',$fee->october)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="november_fee">November Fee</label>
                                        <input type="text" name="november" class="form-control" id="november_fee" placeholder="Enter November Fee"value="{{old('november',$fee->november)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="december_fee">December Fee</label>
                                        <input type="text" name="december" class="form-control" id="december_fee" placeholder="Enter December Fee" value="{{old('december',$fee->december)}}">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="january_fee">January Fee</label>
                                        <input type="text" name="january" class="form-control" id="january_fee" placeholder="Enter January Fee" value="{{old('january',$fee->january)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="february_fee">February Fee</label>
                                        <input type="text" name="february" class="form-control" id="february_fee" placeholder="Enter February Fee" value="{{old('february',$fee->february)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="march_fee">March Fee</label>
                                        <input type="text" name="march" class="form-control" id="march_fee" placeholder="Enter March Fee" value="{{old('march',$fee->march)}}">
                                    </div>
                                </div>
                            </div>
                            

                             
                            </div>
                              
                              
                          </div>

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Add Fee Structure </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

      </div>
  </section>

</div>
@endsection
