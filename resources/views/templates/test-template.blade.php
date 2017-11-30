@extends('layouts.master')

@section('title', '')
@section('description', '')

@section('styles')
    <style type="text/css">
    body{
        background-color: green;
    }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$page->page_name}}</h1>
            <p>Test Template </p>
            <div class="col col-xs-6">

            </div>
            <div class="col col-xs-6">

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection