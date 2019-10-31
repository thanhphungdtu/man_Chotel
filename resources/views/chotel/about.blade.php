@extends('templates.chotel.master')
@section('main')
    <div class="about">
        @include('templates.chotel.leftbar')
        <div>
            <h3>Tiêu đề giới thiệu</h3>
            <div class="vnecontent">
                {!! $about->detail_text !!}
            </div>
        </div>
    </div>
@stop
