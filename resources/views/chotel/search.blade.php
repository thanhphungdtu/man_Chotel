@extends('templates.chotel.master')
@section('main')
    <div class="blog">
        <div class="vnelist">
            <ul>
                {{--<li class="active"><a href="">Phòng loại 2</a></li>--}}
                @foreach($listType as $type)
                    <li><a href="{{route('chotel.chotel.getCategory', $type->type_id)}}">{{$type->tname}}</a></li>
                @endforeach
            </ul>

        </div>
        <div class="rs">
            <h2>Kết quả tìm kiếm với: {{$search}}</h2>
        </div>
        <ul>
            @foreach($listRoom as $room)
                <li>
                    <div>
                        <a href="#"><img src="{{getenv('FILES_URL')}}/{{$room->picture}}" alt=""></a> <span></span>
                    </div>
                    <div>
                        <div>
                            <h3>{{$room->rname}}</h3>
                            <div>
                                <span>Tiện ích: {{$room->uname}}</span>
                            </div>
                        </div>
                        <p>{!! $room->description !!}</p>
                        <a href="{{route('chotel.chotel.detail', $room->rid)}}">Chi tiết</a>
                    </div>
                </li>
            @endforeach

        </ul>

        {{$listRoom->links()}}
    </div>
@stop

