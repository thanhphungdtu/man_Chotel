@extends('templates.chotel.master')
@section('main')
    <div class="home">
        <div class="featured">
            <img src="{{getenv('PUBLIC_URL')}}/chotel/images/featured.jpg" alt="">
            <div>
                <div>
                    <p>Mô tả khách sạn nổi bật ngẫu nhiên</p>
                    <a href="about.html"></a>
                </div>
            </div>
        </div>

        <div>
            <ul>
                @foreach($listRoom as $room)
                    @php
                    $rid = $room->rid;
                    $rname = $room->rname;
                    $picture = $room->picture;
                    $uname = $room->uname;
                    @endphp
                    <li>
                        {{--<a href="#"><img src="{{getenv('PUBLIC_URL')}}/chotel/images/girl1.jpg" alt=""></a>--}}
                        <a href="{{route('chotel.chotel.detail', $rid)}}"><img src="{{getenv('FILES_URL')}}/{{$picture}}" alt=""></a>
                        <h3 class="title"><a href="{{route('chotel.chotel.detail', $rid)}}">{{$rname}}</a></h3>
                        <h3>{{$uname}}</h3>
                        <p>
                            Mô tả khách sạn
                        </p>

                        <a href="{{route('chotel.chotel.detail', $rid)}}" class="click-here"></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="blog">

        {{$listRoom->links()}}
    </div>
@stop

