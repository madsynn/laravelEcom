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
			<h1> Users <small> | Control Panel</small> </h1>
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
				<table class="table">
					<tr id="table-header">
						<td>#</td>
						<td>Type</td>
						<td>Username</td>
						<td>Firstname</td>
						<td>Lastname</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Country</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->isAdmin == 1 ? 'Admin' : 'User' }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->userInfo->firstname }}</td>
						<td>{{ $user->userInfo->lastname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->userInfo->phone }}</td>
						<td>{{ $user->userInfo->country }}</td>
						<td><a href="{{ url('/admin/user/'.$user->id.'/edit') }}" class="fa fa-pencil-square-o"></a></td>
						<td><a href="{{ url('/user/'.$user->id.'/delete') }}" class="fa fa-times {{ Auth::user()->id == $user->id ? 'not-active' : '' }}"></a></td>
					</tr>
					@endforeach
				</table>
				{!! $users->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
	$(document).ready(function(){
		$('.sidebar #users').addClass('active-section');
	});
</script>
@endsection

@section('clipinline')
Index.init();
TableData.init();
@endsection
