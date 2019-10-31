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
        {{--<ul class="paging">
            <li>
                <a href="#">&#60;&#60;</a>
            </li>
            <li>
                <a href="#">Trang đầu</a>
            </li>
            <li>
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">Trang cuối</a>
            </li>
            <li>
                <a href="#">&#62;&#62;</a>
            </li>
        </ul>--}}
        {{$listRoom->links()}}
    </div>
@stop

