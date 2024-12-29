@extends('admin.layout')
@section('content')
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Manage Subjects </h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href=""{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Subject</li>
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
                          <h3 class="card-title">Update subject </h3>
                      </div>


                      <form action="{{route('subject.update', $subjects->id)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subjectName">Subject Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            id="subjectName"
                                            placeholder="Enter Subject Name"

                                        >
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select
                                            name="type"
                                            id="type"
                                            class="form-control"
                                        >
                                            <option value="theory">Theory</option>
                                            <option value="Lab">Sessional</option>
                                        </select>
                                        @error('type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

      </div>
  </section>

</div>
@endsection
