@extends('backend/layout/clip')

@section('topscripts')
	<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->


	<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('pagetitle')
	<div class="row">
		<div class="col-sm-12">
			<!-- start: PAGE TITLE & BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
				<li><a href="{!! url(getLang() . '/admin/ecom') !!}"><i class="fa fa-dashboard"></i>&nbsp; Ecommerce </a></li>
			</ol>
			<div class="page-header">
				<h1 class="pull-left">eCommerce Dashboard</h1>
			</div>
		</div>
	</div>
@endsection

@section('content')
<div class="dashboard container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="clip-stats"></i>
                    Ecommerce Stats
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                        <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                    </div>
                </div>
                <div class="panel-body">


                <div class="col-md-12">
                    <h3>Monthly Income Report : {{ $total }} $</h3>
                    <canvas id="payment-report" width="950" height="470"></canvas>
                </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')

    <script src="{!! asset('/clip/assets/js/charts.js') !!}"></script>
	<script>
	$(document).ready(function(){
		//$('.sidebar #dashboard').addClass('active-section');
		var ctx = document.getElementById('payment-report').getContext('2d');
		var labels = {!! json_encode($timestamps) !!};
		var data = {{ json_encode($totals) }};
		var chart = {
			labels : labels,
			datasets : [{
				data : data,
				fillColor : "#80B3D1",
				strokeColor : "#25343e",
				pointColor : "#25343e"
			}]
		};
		new Chart(ctx).Line(chart);
	});
</script>
@endsection

@section('clipinline')

@endsection
