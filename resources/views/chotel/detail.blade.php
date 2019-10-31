@extends('templates.chotel.master')
@section('main')
    <div class="about">
        @include('templates.chotel.leftbar')
        <div>

            @php
                $rname = $roomDetail->rname;
                $description = $roomDetail->description;
                $tname = $roomDetail->tname;
                $uname = $roomDetail->uname;
            @endphp
            <h3>Tên Chi tiết phòng {{$rname}}</h3>
            <div class="vnecontent">
                <img src="{{getenv('PUBLIC_URL')}}/chotel/images/featured.jpg" alt="" width="100%"/>
                <p>Loại phòng: <a href="" title="">{{$tname}}</a> Tiện ích: {{$uname}}</p>
                {!! $description !!}
            </div>
            <div class="raroom">
                <ul>

                    @foreach($relativeRoom as $room)
                        @php
                            $rrid = $room->rid;
                            $rrname = $room->rname;
                        @endphp
                        <li>
                            <a href="{{route('chotel.chotel.detail', $rrid)}}" title="">{{$rrname}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
