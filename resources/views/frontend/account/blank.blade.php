@extends('frontend/layout/account')


@section('title')
Dashboard | Account Overview
@endsection

@section('bodytag')
rows
@endsection

@section('header_styles')

@endsection
@section('scripts')@endsection
@section('ppscripts')@endsection

@section('submenu')
    {{--@include('frontend.blog.partials.submenu-items', ['items'=> $menu_blog->roots()])--}}
@endsection

@section('slider')@endsection
@section('intro')@endsection
@section('page-title')@endsection

@section('sidebar')
    @parent

{{--  This is appended to the parent dsidebar.  --}}
@endsection

@section('content')

            @include('frontend.account.partials.dev')

@endsection

@section('footer_scripts')@endsection

@section('pp_footer_scripts')




@endsection

@section('inlinejs')@endsection
