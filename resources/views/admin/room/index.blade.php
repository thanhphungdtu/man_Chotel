@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{route('admin.room.getAddRoom')}}" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm"
                                               class="btn btn-warning btn-sm" style="float:right"/>
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện"
                                               style="float:right; width: 300px;"/>
                                        <div style="clear:both"></div>
                                    </form>
                                    <br/>
                                </div>
                            </div>
                            @if(Session::has('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('msg')}}
                                </div>
                            @endif
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    {{--<th>Mô tả</th>--}}
                                    <th>Loại</th>
                                    <th>Tiện ích</th>
                                    <th width="160px">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($roomList)
                                    @foreach($roomList as $room)
                                        @php
                                            $rid = $room->rid;
                                            $rname = $room->rname;
                                            $description = $room->description;
                                            //$type = $room->
                                            $utiliti = $room->uname;
                                            $tname = $room->tname;
                                            $picture = $room->picture;
                                        @endphp
                                        <tr class="gradeX">
                                            <td>{{$rid}}</td>
                                            <td>{{$rname}}</td>
                                            {{-- <td>{!! $description !!}</td>--}}
                                            <td class="center">{{$tname}}</td>
                                            <td>{{$utiliti}}</td>
                                            <td class="center">
                                                <a href="{{route('admin.room.getEditRoom', $rid)}}" title=""
                                                   class="btn btn-primary"><i class="fa fa-edit "></i>
                                                    Sửa</a>
                                                <a href="{{route('admin.room.deleteRoom', $rid)}}" title="" class="btn btn-danger" onclick="return confirm('Ban co muon xoa khong?')">
                                                    <i class="fa fa-pencil"></i>
                                                    Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-sm-6">
                                    {{--<div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">
                                        Hiển thị từ 1 đến 5 của 24 truyện
                                    </div>--}}
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="dataTables-example_paginate">
                                        {{$roomList->links()}}
                                        {{--<ul class="pagination">
                                            <li class="paginate_button previous disabled"
                                                aria-controls="dataTables-example" tabindex="0"
                                                id="dataTables-example_previous"><a href="#">Trang trước</a></li>
                                            <li class="paginate_button active" aria-controls="dataTables-example"
                                                tabindex="0"><a href="#">1</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example"
                                                tabindex="0"><a href="#">2</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example"
                                                tabindex="0"><a href="#">3</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example"
                                                tabindex="0"><a href="#">4</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example"
                                                tabindex="0"><a href="#">5</a></li>
                                            <li class="paginate_button next" aria-controls="dataTables-example"
                                                tabindex="0" id="dataTables-example_next"><a href="#">Trang tiếp</a>
                                            </li>
                                        </ul>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
@stop
