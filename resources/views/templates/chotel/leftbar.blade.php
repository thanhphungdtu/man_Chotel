<ul>
    {{--<li class="selected">
        <a href="cat.php">Phòng loại 1</a>
    </li>--}}
    @foreach($listType as $type)
        <li>
            <a href="{{route('chotel.chotel.getCategory',$type->type_id)}}">{{$type->tname}}</a>
        </li>
    @endforeach
</ul>
