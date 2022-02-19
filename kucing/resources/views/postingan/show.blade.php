@extends('admin-template')

@section('content-wrapper')


<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Discussion</h1>
			</div>

		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">{{ $postingan->title }} </h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i>Category: {{ $postingan->Category->name }}</i>
							</button>

						</div>
					</div>
					<div class="card-body">
						{{ $postingan->description }}
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						@if(isset($postingan->image))
						<img src="{{ asset('imageUpload/' . $postingan->image) }}" height="auto" width="300">
						@endif
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default">
								
								@foreach ($postingan->comments as $comment)
                <div class="card-footer card-comments">
                    <div class="card-comment">
                    <!-- User image -->
                    <div class="comment-text">
                        <span class="username">
                        {{$comment->name}}
                        <span class="text-muted float-right">{{$comment->created_at->diffForHumans()}}</span>
                        </span><!-- /.username -->
                        {{$comment->comment}}
										@if ($comment->id_user == Auth::id() || Auth::user()->role == 'admin')
										<form method="post" action="{{ url('/comments/'.$comment->id )}}">
											<input type="hidden" name="_method" value="DELETE" />
											<input type="hidden" name="_token" value="{{ csrf_token() }}" />
											<input type="submit" value="Delete" class="btn btn-light btn-sm">
										</form>
										@endif
                    <!-- /.comment-text -->
                    </div>
                </div>
								</div>
            @endforeach
						<!-- /.card-footer -->
						<div class="panel-heading">Tambahkan Komentar</div>
                <div class="card-footer">
									<form id="comment-form" method="post" action="{{ route('comments.store') }}" >
										{{ csrf_field() }}
										<input type="hidden" name="id_postingan" value="{{$postingan->id}}">
											<input type="hidden" name="id_user" value="{{ Auth::user()->id }}" >
											<!-- <div class="row" style="padding: 10px;"> -->
													<div class="form-group">
															<textarea class="form-control form-control-sm" name="comment" placeholder="Tulis komentar"></textarea>
													</div>

											<div class="row" style="padding: 0 10px 0 10px;">
													<div class="form-group">
															<input type="submit" class="btn btn-primary btn-md" style="width: 100%" name="submit">
													</div>
											</div>
									</form>
                </div>
                <!-- /.card-footer -->
                </div>
								<div class="btn-group">


                </div>
                <form action="/comment/postingan/{{$postingan->id}}"style="margin-top:10px;display:none;" id="komentar-utama" method="POST">
					<input type="hidden" name="id_postingan" value="{{$postingan->id}}">
                    <input type="hidden" name="parent" value="0">
                    <textarea name="konten" class="form-control" id="komentar-utama" rows="4"></textarea>
                    <input type="submit" class="btn btn-primary" value="Kirim">
                </form>

								<div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    
{{-- 
    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body comment-container" >

                    @foreach($comments as $comment)
                                    <!-- Dynamic Reply form -->

                                </div>
                                  @if($comment->id)
                                    <div class="well">
                                        <div style="margin-left:10px;">
                                        <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>
																								&nbsp;
																				<a did="{{ $comment->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                        </div>
                                        <div class="reply-to-reply-form">

                                                <!-- Dynamic Reply form -->

                                            </div>

                                        </div>
                                    @endif

                            </div>
                        </div>
                    @endforeach




					<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-headline">
				<div class="panel-heading">

					<p class="panel-subtitle"></p>
				</div>
				<div class="panel-body">
					<!-- {{$postingan->konten}} -->
                <hr>



                </div>
			</div>
                </div>
            </div>
        </div>
    </div>
</div>


 --}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}">

</script>
<script>
		$(document).ready(function(){
				$('#btn-komentar-utama').click(function(){
						$('#komentar-utama').toggle('slide');
				});
		});
</script>




@stop
