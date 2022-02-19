@extends('admin-template')

@section ('content-wrapper')

<div class="card">
              <div class="card-header">
                <h1 class="m-0">
                {{ $title }}
                </h1>
                @include('errors.errors_list')

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ action ('CategoryController@store') }}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="row">
                    <div class="col-sm-6">

                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter ..." value="{{ old('name') }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->


                  <div class="row">
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
@stop
