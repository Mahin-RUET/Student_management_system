@extends('student.layout')
@section('content')
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Change Password</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Change Password</li>
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
                      @if(Session::has('error'))
                      <div class="alert alert-danger">
                          {{ Session::get('error') }}
                      </div>
                  @endif

                      <div class="card-header">
                          <h3 class="card-title">Update Password</h3>
                      </div>

                      <form action="{{route('student.updatePassword')}}" method="POST">
                          @csrf
                          <div class="card-body">
                              <div class="row">
                                  <!-- Old Password -->
                                  <div class="form-group col-md-4">
                                      <label for="old_password">Old Password</label>
                                      <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter Old Password">
                                      @error('old_password')
                                          <p class="text-danger">{{$message}}</p>
                                      @enderror
                                  </div>

                                  <!-- New Password -->
                                  <div class="form-group col-md-4">
                                      <label for="new_password">New Password</label>
                                      <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter New Password">
                                      @error('new_password')
                                          <p class="text-danger">{{$message}}</p>
                                      @enderror
                                  </div>

                                  <!-- Confirm Password -->
                                  <div class="form-group col-md-4">
                                      <label for="password_confirmation">Confirm Password</label>
                                      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password">
                                      @error('password_confirmation')
                                          <p class="text-danger">{{$message}}</p>
                                      @enderror
                                  </div>
                              </div>
                          </div>

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Change Password</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>

</div>
@endsection
