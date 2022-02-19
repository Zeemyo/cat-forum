@extends('admin-template')

@section ('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">
        {{ $title }}
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$total_category}}</h3>

            <p>Category/Tags</p>
          </div>
          <div class="icon">
            <i class="fas fa-tags"></i>
          </div>
          <a href="{{url('Category')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
             <h3>{{$total_postingan}}<sup style="font-size: 20px"></sup></h3>

            <p>Forum Topics</p>
          </div>
          <div class="icon">
            <i class="fas far fa-comment"></i>
          </div>
          <a href="{{url('postingan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @if ( Auth::user()->role == 'admin')
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
             <h3>{{$total_users}}</h3>
            <p>Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{url('Users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      @endif

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
             <h3>{{$total_artikel}}</h3>

            <p>Artikel</p>
          </div>
          <div class="icon">
            <i class="fas fa-edit"></i>
          </div>
          <a href="{{url('artikel')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- Inner main -->
    <div class="inner-main">
        <!-- Inner main header -->
        <div class="inner-main-header">
            <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>

        </div>
        <!-- /Inner main header -->

        <!-- Inner main body -->

        <div class="section-title">
          <div class="card card-secondary">
                        <div class="card-header">
          <h2>Forum</h2>
        </div>






        <!-- Forum List -->

        @foreach($posts as $postingan)


          <div class="card mb-2">
              <div class="card-body p-2 p-sm-3">
                  <div class="media forum-item">
                      <!-- <a href="#forum" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" /></a> -->
                      <div class="media-body">

                          <h6><a href="{{ url('readmore/'.$postingan->id) }}" data-toggle="collapse" class="text-body">{{ $postingan->title }}</a></h6>


                          <p class="text-secondary">
                              {{ $description = substr($postingan->description, 0, 100) }}

                          </p>
                          <p class="text-muted"><a href="javascript:void(0)">{{ $postingan->user->name }}</a> post <span class="text-secondary font-weight-bold">{{$postingan->updated_at->diffForHumans()}}</span></p>

                          <!-- <p class="text-muted"><a href="#" class="d-block"></a> posts</p> -->
                      </div>



                  </div>

              </div>
          </div>

          @endforeach


        <!-- /Forum List -->

        <div class="section-title">
          <div class="card card-secondary">
                        <div class="card-header">
          <h2>Artikel</h2>
        </div>

    @foreach($artikel as $artikel)


      <div class="card mb-2">
          <div class="card-body p-2 p-sm-3">
              <div class="media forum-item">
                  <!-- <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" /></a> -->
                  <div class="media-body">

                      <h6><a href="{{ url('readmoreartikel/'.$artikel->id) }}" data-toggle="collapse" class="text-body">{{ $artikel->title }}</a></h6>


                      <p class="text-secondary">
                          {{ $description = substr($artikel->description, 0, 100) }}

                          <p class="text-muted"><a href="javascript:void(0)"></a> post <span class="text-secondary font-weight-bold">{{$artikel->updated_at->diffForHumans()}}</span></p>
                      </p>

                      <!-- <p class="text-muted"><a href="#" class="d-block"></a> posts</p> -->
                  </div>



              </div>

          </div>
      </div>
      @endforeach
      <!-- /artikel List -->

    </div>

      </div>




        <!-- /Inner main body -->
    </div>

    <!-- /Inner main -->
  </div>


  </div>


</section>
<!-- /.content -->
@stop
