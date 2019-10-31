@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sủa thông tin phòng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @php
                                    $id = $room->rid;
                                    $name = $room->rname;
                                    $type_id = $room->type_id;
                                    $description = $room->description;
                                    $picture = $room->picture;
                                @endphp
                                <form role="form" action="{{route('admin.room.postEditRoom')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên phòng</label>
                                        <input type="hidden" name="rid" value="{{$id}}">
                                        <input type="text" name="ten_phong" class="form-control" value="{{$name}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Loại phòng</label>
                                        <select class="form-control" name="loai_phong">
                                            @foreach($listType as $type)
                                                <option value="{{$type->type_id}}"
                                                    @php
                                                        if ($type_id == $type->type_id)
                                                        echo 'selected';
                                                    @endphp
                                                >{{$type->tname}}
                                                </option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="hinhanh"/>
                                        <img src="/storage/app/files/{{$picture}}" alt="" name="img">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3"
                                                  name="mota">{!! $description !!}</textarea>
                                    </div>


                                    <button type="submit" name="submit" class="btn btn-success btn-md">Lưu lại</button>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
@stop

