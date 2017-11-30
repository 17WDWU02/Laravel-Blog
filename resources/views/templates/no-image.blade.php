@extends('layouts.master')

@section('title', '')
@section('description', '')

@section('styles')
    <style type="text/css">

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$page->page_name}}</h1>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div>{!!html_entity_decode($page->page_content)!!}</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection