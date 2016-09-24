
@extends('backend/layout/clip')

@section('pagetitle')
	<div class="row">
		<div class="col-sm-12">
			<!-- start: PAGE TITLE & BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Product</li>
			</ol>
			<div class="page-header">
				<h1> Products <small> | Control Panel</small> </h1>
			</div>
			<!-- end: PAGE TITLE & BREADCRUMB -->
		</div>
	</div>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="clip-stats"></i>
				Panel Data
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
					<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
					<a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
					<a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="panel-body">




				<div class="container-fluid add-product">
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form action="/section/create" method="post">
						<div class="row">
							<div class="form-group col-md-5">
								<label for="name" class=" control-label">Section Name : </label>
								<input id="name" type="text" class="form-control" name="name">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-5">
								<input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Add Section">
							</div>
						</div>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					</form>
				</div>



			</div>
		</div>
	</div>
</div>
@endsection

@section('bottomscripts')
	<script>
		$(document).ready(function(){
			$('.sidebar #sections').addClass('active-section');
		});
	</script>
@endsection

@section('clipinline')
	TableData.init();
@endsection