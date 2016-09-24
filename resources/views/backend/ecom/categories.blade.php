@extends('backend/layout/clip')

@section('topscripts')
	<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
	<link href="{!! asset('/clip/bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/assets/plugin/bootstrap-timepicker.min.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/jquery.tagsinput/dist/jquery.tagsinput.min.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/bootstrap-fileinput/css/fileinput.min.css') !!}" rel="stylesheet" />

	<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('pagetitle')
	<div class="row">
		<div class="col-sm-12">
			<!-- start: PAGE TITLE & BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Categories</li>
			</ol>
			<div class="page-header">
				<h1 class="pull-left">Create New Categoy</h1>
			</div>
			<!-- end: PAGE TITLE & BREADCRUMB -->
		</div>
	</div>
@endsection

@section('content')
<div class="container-fluid">
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

                    <div class="space12">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-default active" href="javascript:void(0)"> Categories </a>
                            <a class="btn btn-default hidden-xs" href="{!! route('admin.categories.create') !!}">
                             <i class="fa fa-plus"></i> Add New Category</a>
                        </div>
                    </div>

						<table class="table">
						    <tr id="table-header">
						        <td>#</td>
						        <td>Name</td>
						        <td>Products</td>
						        <td>Section</td>
						        <td>Edit</td>
						        <td>Delete</td>
						    </tr>
						    @foreach($categories as $category)
						    <tr>
						        <td>{{ $category->id }}</td>
						        <td>{{ $category->title }}</td>
						        <td>{{ $category->products->count() }}</td>
						        <td>{{ $category->section ? $category->section->name : '' }}</td>
						        <td><a href="{{ url('/admin/category/'.$category->id.'/edit') }}" class="fa fa-pencil-square-o fa-lg"></a></td>
						        <td><a href="{{ url('/category/'.$category->id.'/delete') }}" class="fa fa-times fa-lg"></a></td>
						    </tr>
						    @endforeach
						</table>
						{!! $categories->render() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
		<script>
			$(document).ready(function(){
				$('.sidebar #categories').addClass('active-section');
			});
		</script>
@endsection

@section('clipinline')
		TableData.init();
@endsection
