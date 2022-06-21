@extends('template')

@section('title')
    Блог
@endsection

@section('main-content')
    <div id="iframe_content">
        <iframe name="abc_frame" class="superFrame" id="abc_frame" src="comments"></iframe>
    </div>
@endsection

