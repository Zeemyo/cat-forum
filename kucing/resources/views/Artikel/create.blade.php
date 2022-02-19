@extends('admin-template')

@section ('content-wrapper')

<div class="card ">
              <div class="card-header">
                <h3 class="card-title">Tambahkan Artikel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ action ('ArtikelController@store') }}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="row">
                    <div class="col-sm-6">

                      <!-- text input -->
                      <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter ...">
                      </div>

                      <div class="form-group">
                        <label>Category</label>
                        <select id="id_Category" class="form-control" name="id_Category">
                          <option selected="selected" value="">Pilih Category</option>
                          @foreach( $category as $c )
                          <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                          </select>
                      </div>

                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"  rows="3" placeholder="Enter ..."></textarea>
                      </div>


                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image">
                  </div>
                </div>
              </div>

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
