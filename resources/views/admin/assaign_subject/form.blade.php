@extends('admin.layout')
@section('content')
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Assaign Subject</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href=""{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Assaign Subject</li>
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
                          <h3 class="card-title">Add Assaign Subject </h3>
                      </div>


                      <form action="{{route('class.store')}}" method="POST">
                        @csrf
                          <div class="card-body">
                              <div class="form-group">
                                <select name="class_id" Class="form-control" >
                                    <option disabled selected> Select Class</option>
                                    @foreach ($classes as $class )
                                     <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror



                          </div>

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Add Class</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

      </div>
  </section>

</div>
@endsection