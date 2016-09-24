@extends('backend/layout/clip')

@section('topscripts')

@endsection


@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
                <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Pages</li>
            </ol>
            <div class="page-header">
                <h1> Ecommerce Pages <small> | Control Panel</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection

@section('content')
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
<form action="/page/create" method="post">
	<div class="row">
		<div class="form-group col-md-10">
			<label for="page_title" class=" control-label">Page Title : </label>
			<input id="page_title" type="text" class="form-control" name="page_title">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			{{-- <label for="page_name" class=" control-label">Page Name : </label> --}}
			<div class="row">
				<div class="col-md-3">
					<span>/pages/</span>
				</div>
				<div class="col-md-8">
					<input id="page_name" type="text" class="form-control" name="page_name" placeholder="page name">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-10">
			<textarea name="page_source" id="page_source" class="summernote"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-10">
			<input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Create Page">
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>


@endsection

@section('bottomscripts')
	<script src="/ckeditor-standard/ckeditor.js"></script>

    <script>
        $(document).ready(function(){
       // CKEDITOR.replace('page_source');
          //  $('.sidebar #categories').addClass('active-section');
        });
    </script>
@endsection

@section('clipinline')
    TableData.init();
@endsection
