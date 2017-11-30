@extends('layouts.admin')

@section('title', ' Add New Page')
@section('description', 'This is the admin Page')

@section('styles')

@endsection

@section('content')
    <h2>Pages</h2>
    <hr>
    <h3>Current Pages</h3>
    @if($pages)
        <ul>
            @foreach($pages as $page)
                <li><a href="/{{$page->url_alais}}">{{$page->page_name}}</a></li>
            @endforeach
        </ul>
    @endif
    <hr>
    <h3>Add New Page</h3>
    @if($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::open(array('url' => 'pages')) }}

        <div class="form-group">
            {{ Form::label('pageName', 'Page Title')}}
            {{ Form::text('pageName', '', array('class' => 'form-control'))}}
        </div>
        <div>
            content
        </div>
        <div class="form-group">
            {{ Form::label('pageName', 'Page Template')}}
            <select class="form-control" name="template">
                <option value="" disabled selected>Select a Template</option>
                @foreach($templates as $template)
                    <option value="{{$template}}">{{$template}}</option>
                @endforeach
            </select>
        </div>

        {{Form::submit('Add New Page', array('class' => 'btn btn-outline-primary'))}}
    {{Form::close()}}


@endsection

@section('scripts')

@endsection