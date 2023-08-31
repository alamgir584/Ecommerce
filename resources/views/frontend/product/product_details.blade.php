@extends('layouts.app')
@section('content')

{{-- for hide categories --}}
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_responsive.css')}}">

@include('layouts.front_partial.collaps_nav')
@include('layouts.front_partial.single_product_page')

@endsection