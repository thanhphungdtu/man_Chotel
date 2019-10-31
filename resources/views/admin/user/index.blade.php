@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý user</h2>
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
                                    <a href="{{route('admin.user.getAdd')}}" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm"
                                               class="btn btn-warning btn-sm"
                                               style="float:right"/>
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
                            @if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                            @endif

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Role</th>
                                    <th width="160px">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listUser as $user)
                                    <tr class="gradeX">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->fullname}}</td>
                                        <td>{{$user->role}}</td>
                                        <td class="center">
                                            <a href="{{route('admin.user.getEdit', $user->id)}}" title=""
                                               class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a href="{{route('admin.user.deleteUser', $user->id)}}" title=""
                                               class="btn btn-danger"
                                               onclick="return confirm('Ban co muon xoa khong?')">
                                                <i class="fa fa-pencil"></i>
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{--<div class="row">
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Trang trước</a></li>
                                            <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">3</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">4</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">5</a></li>
                                            <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Trang tiếp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>--}}
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

@stop
