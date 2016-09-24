@extends('backend/layout/clip')

@section('topscripts')

@endsection


@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
                <li><a href="{!! url(getLang(). '/admin/category') !!}"><i class="fa fa-list"></i> Category</a></li>
                <li class="active">Add Category</li>
            </ol>
            <div class="page-header">
                <h1> Category <small> | Add Category</small> </h1>
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
                            <a class="btn btn-default" href="{!!  route('admin.categories') !!}"> Categories </a>
                            <a class="btn btn-default  active" href="javascript:void(0)"> <i class="fa fa-plus"></i>   Add Category </a>
                            <a target="_blank" class="btn btn-default" href="{!! route('admin.sections.create') !!}"><i class="fa fa-plus"></i> Add Section</a>
                        </div>
                    </div>


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
    <form  method="post">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="name" class=" control-label">Category Name : </label>
            <input id="name" type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <label for="name" class="control-label">Section : </label>
            <select name="section_id" class="form-control">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Add Category">
        </div>
    </div>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
	<script>
	$(document).ready(function(){
		$('.sidebar #categories').addClass('active-section');
	});
	</script>
@endsection
