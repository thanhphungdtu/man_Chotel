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
                                    <th>AID</th>
                                    <th>Preview text</th>
                                    <th>Picture</th>
                                    <th>Active</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr class="gradeX">
                                        <td>{{$about->aid}}</td>
                                        <td>{{$about->preview_text}}</td>
                                        <td>
                                            <img src="{{getenv('FILES_URL')}}/{{$about->picture}}" alt="">
                                        </td>
                                        <td>{{$about->active}}</td>
                                        <td class="center">
                                            <a href="#" title=""
                                               class="btn btn-primary"><i class="fa fa-edit "></i>
                                                Sửa</a>
                                            <a href="" title="" class="btn btn-danger"><i class="fa fa-pencil"></i>
                                                Xóa</a>
                                        </td>
                                    </tr>
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
