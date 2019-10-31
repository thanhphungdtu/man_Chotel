@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm phòng</h2>
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
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên phòng</label>
                                        <input type="text" name="ten_phong" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Loại phòng</label>
                                        <select class="form-control" name="loai_phong">
                                            @foreach($listType as $type)
                                                @php
                                                    $id = $type->type_id;
                                                    $name = $type->tname;
                                                @endphp
                                                <option value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thiết bị</label>
                                        <select class="form-control" name="thiet_bi">
                                            @foreach($utilities as $utility)
                                                @php
                                                    $id = $utility->uid;
                                                    $name = $utility->uname;
                                                @endphp
                                                <option value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="hinhanh"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" name="mota"></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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

