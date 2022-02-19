@extends('admin-template')

@section('content-wrapper')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Artikel</h1>
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
						<h3 class="card-title">{{ $artikel->title }} </h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i>Category: {{ $artikel->Category->name }}</i>
							</button>

						</div>
					</div>
					<div class="card-body">
						{{ $artikel->description }}
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						@if(isset($artikel->image))
						<img src="{{ asset('imageUpload/' . $artikel->image) }}" height="auto" width="500">
						@endif
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->





			




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
					<!-- {{$artikel->konten}} -->
                <hr>



                </div>
			</div>
                </div>
            </div>
        </div>
    </div>
</div>





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
