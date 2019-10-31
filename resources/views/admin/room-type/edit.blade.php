@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm loại phòng</h2>
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
                                <form role="form" method="post" action="{{route('admin.roomType.editPostRoomType')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Loại phòng</label>
                                        <input type="hidden" name="type_id" value="{{$roomType->type_id}}">
                                        <input type="text" name="type_name" class="form-control"
                                               value="{{$roomType->tname}}"/>
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
    <!-- /. PAGE INNER  -->
    <!-- /. PAGE WRAPPER  -->
@stop
