@extends('backend/layout/clip')

{{--@inject('prices', 'App\Models\Price')--}}
{{--@inject('categories', 'App\Models\Category')--}}
@section('topscripts')
<script type="text/javascript">
    $(document).ready(function () {

        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{!! url(getLang() . '/admin/product/" + id + "/toggle-publish/') !!}",
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (response) {
                    if (response['result'] == 'success') {
                        var imagePath = (response['changed'] == 1) ? "{!!url('/')!!}/assets/images/publish.png" : "{!!url('/')!!}/assets/images/not_publish.png";
                        $("#publish-image-" + id).attr('src', imagePath);
                    }
                },
                error: function () {
                    alert("error");
                }
            })
        });
    });
</script>
@endsection


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
                    @include('flash::message')
                    <div class="space12">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-default active" href="javascript:;">
                                Products
                            </a>
                            <a class="btn btn-default hidden-xs" href="{!!  route('admin.product.create') !!}">
                                <i class="fa fa-plus"></i>   Add Product
                            </a>
                            {{--         <a target="_blank" class="btn btn-default" href="">
                            Add Category
                            </a> --}}
                        </div>
                    </div>


               <table class="table table-striped table-hover table-condensed table-bordered table-responsive">
                   <tr id="table-header">

                       <th colspan="1">
                           <a href="{!! url(Request::url().'?sort=id&orderby=') !!}{!! Request::get('orderby') == 'asc' ? 'desc' : 'asc'!!}"><strong>ID</strong> {!! Request::get('sort') == 'id' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a>
                       </th>
                       {{-- style="min-width:70px"--}}
                       <th colspan="2">
                           <a href="{!! url(Request::url().'?sort=name&orderby=') !!}{!! Request::get('orderby') == 'asc' ? 'desc' : 'asc'!!}">Product {!! Request::get('sort') == 'name' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a>
                       </th>
                       <th colspan="2" class="text-center"> <strong>SKU / UPC </strong> </th>
                       <th>

                           <a href="{!! url(Request::url().'?sort=category&orderby=') !!}{!! Request::get('orderby') == 'asc' ? 'desc' : 'asc'!!}">
                               <strong>Category</strong>
                               {!! Request::get('sort') == 'category' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}
                           </a>

                       </th>
                       <th colspan="1" class="text-center">
                           <a href="{!! url(Request::url().'?sort=price&orderby=') !!}{!! Request::get('orderby') == 'asc' ? 'desc' : 'asc'!!}">Price {!! Request::get('sort') == 'price' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a>
                       </th>
                       <th colspan="1">
                           <strong>Date added</strong>
                       </th>
                       <th colspan="1" class="text-center">
                           <a href="{!! url(Request::url().'?sort=quantity&orderby=') !!}{!! Request::get('orderby') == 'asc' ? 'desc' : 'asc'!!}">Stock{!! Request::get('sort') == 'quantity' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a>
                       </th>
                       {{--<th class="text-center">--}}
                           {{--<strong>Sales</strong>--}}
                       {{--</th>--}}
                       <th colspan="1" class="text-center">
                           <a href="{!! url(Request::url().'?sort=status&orderby=') !!}{!! Request::get('orderby') == 'asc' ? 'desc' : 'asc'!!}">Status {!! Request::get('sort') == 'status' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a>
                       </th>
                       <th colspan="1">Published</th>
                       <th colspan="2" class="text-center">
                           <strong>Actions</strong>
                       </th>
                   </tr>
                        @foreach($products as $product)
                            @foreach($product->prices as $price)
                           {{--class="danger"--}}
                            <tr>

                                <td colspan="1">
                                    <a target="_blank" href="{!! url(getLang().'/product/' . $product->slug .'/show') !!}">{!! $product->id !!}</a>
                                </td>
                                {{--<td><a href="{!! route('product.view') !!}">{!! $product->id !!}</a></td>--}}
                                <td colspan="2" class="table-product-name">
                                    <a href="{!! url('/admin/product/'.$product->id.'/edit') !!}" class="fa fa-pencil-square-o" style="color:#fff;">
                                        &nbsp; {!! $product->name !!}
                                    </a>
                                </td>
                                <td colspan="2" class="text-center">{!! $price->sku !!} / {!! $price->upc !!}</td>
                                {{--<td> {!! $product->category[0]->title !!} </td>--}}
                                <td>
                                    @foreach($product->categories as $category)
                                    {!! $category->title !!}
                                    @endforeach
                                </td>
                                <td colspan="1" class="text-center"><strong>{!! $price->price !!}</strong></td>
                                <td colspan="1">{!!  $product->created_at->format('F d, Y') !!}</td>
                                <td colspan="1" class="text-center">{!! $price->quantity !!}</td>
                                <td id="status" class="text-center">
                                   {{--<span class="label label-success w-300">{!! $product->status !!}</span>--}}
                                    @if ($product->status =='Online')
                                        <span class="label label-primary w-300 normalize-label">{!! $product->status !!}</span>
                                    @elseif ($product->status =='Offline')
                                        <span class="label label-dark w-300 normalize-label"> {!! $product->status !!}</span>
                                    @elseif ($product->status =='Removed')
                                        <span class="label label-danger w-300 normalize-label">{!! $product->status !!}</span>
                                    @elseif ($product->status =='Archived')
                                        <span class="label label-warning w-300 normalize-label">{!! $product->status !!}</span>
                                    @elseif ($product->status =='OnBackorder')
                                        <span class="label label-warning normalize-label">{!! $product->status !!}</span>
                                    @else
                                        <span class="label  w-300 normalize-label" style="color:black">{!! $product->status !!}</span>
                                    @endif
                                </td>
                                {{--Online--}}
                                {{--Offline--}}
                                {{--Removed--}}
                                {{--Archived--}}
                                {{--Discontinued--}}
                                {{--<span class="label label-default normalize-label">Online</span>--}}
                                {{--<span class="label label-primary normalize-label">Primary Label</span>--}}
                                {{--<span class="label label-success normalize-label">Online</span>--}}
                                {{--<span class="label label-info normalize-label">Info Label</span>--}}
                                {{--<span class="label label-warning normalize-label">Warning Label</span>--}}
                                {{--<span class="label label-danger normalize-label">Danger Label</span>--}}
<td class="text-center">
    <a href="#" id="{!! $product->id !!}" class="publish">
        {{--{!! ($product->is_published) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>'  !!}--}}
        <img id="publish-image-{!! $product->id !!}" src="{!! url('/') !!}/assets/images/{!! ($product->is_published) ? 'publish.png' : 'not_publish.png'  !!}"/>
    </a>
</td>

                                <td colspan="2" class="text-center ">

                                    <a href="{!! url(getLang().'/admin/product/'.$product->id.'/edit') !!}" class="edit btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
                                    <a target="_blank" href="{!! url(getLang().'/product/' . $product->slug .'/show') !!}" class="preview btn btn-sm btn-danger"><i class="fa fa-pencil"></i>&nbsp; Preview</a>
                                    <a href="{!! url(getLang().'/admin/product/'.$product->id.'/delete') !!}" class="delete btn btn-sm btn-dark" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-times-circle"></i>&nbsp; Remove</a>
                                </td>

                            </tr>



                            @endforeach
                        @endforeach
                    </table>
                    {!! $products->appends(['sort' => Request::get('sort'), 'orderby' => Request::get('orderby')])->render() !!}



                   {{--@include('backend.ecom.products.temp.table')--}}



                    <br style="clear:both" />











                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottomscripts')
    <script type="text/javascript" src="{!! asset('/backend/assets/plugins/jquery-mockjax/jquery.mockjax.js') !!}"></script>
    <script>
        $(document).ready(function(){
            $('.sidebar #products').addClass('active-section open active');
        });
    </script>
@endsection

@section('clipinline')
    {{--TableData.init();--}}
@endsection