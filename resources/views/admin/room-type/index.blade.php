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
                                    <a href="{{route('admin.roomType.addPostRoomType')}}"
                                       class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm"
                                               class="btn btn-warning btn-sm" style="float:right"/>
                                        <input type="search" class="form-control input-sm"
                                               placeholder="Nhập tên truyện" style="float:right; width: 300px;"/>
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
                                    <th width="160px">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roomType as $type)
                                    @php
                                        $id= $type->type_id;
                                        $name = $type->tname;
                                    @endphp
                                    <tr class="gradeX">
                                        <td>{{$id}}</td>
                                        <td>{{$name}}</td>
                                        <td class="center">
                                            <a href="{{route('admin.roomType.editGetRoomType', ['id'=> $id])}}" title=""
                                               class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>

                                            <a href="{{route('admin.roomType.deleteRoomType', $id)}}" title=""
                                               class="btn btn-danger"
                                               onclick="return confirm('Ban co muon xoa khong?')"><i
                                                    class="fa fa-pencil"></i> Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

@stop
