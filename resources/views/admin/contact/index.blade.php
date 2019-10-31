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
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $ct)
                                    <tr class="gradeX">
                                        <td>{{$ct->cid}}</td>
                                        <td>{{$ct->fullname}}</td>
                                        <td>{{$ct->email}}</td>
                                        <td class="center">{{$ct->subject}}</td>
                                        <td class="center">{{$ct->content}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                {{--<div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="dataTables-example_paginate">
                                        <ul class="pagination">
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
                                        </ul>
                                    </div>
                                </div>--}}
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

    <!-- /. PAGE INNER  -->
@stop
