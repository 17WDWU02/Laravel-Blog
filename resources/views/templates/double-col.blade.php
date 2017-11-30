@extends('layouts.master')

@section('title', '')
@section('description', '')

@section('styles')
    <style type="text/css">
    body{
        background-color: red;
    }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$page->page_name}}</h1>
            <p>double column </p>
            <div class="col col-xs-6">
                <div>image</div>
            </div>
            <div class="col col-xs-6">
                <div>content</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection