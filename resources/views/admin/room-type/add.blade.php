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
                                <form role="form" method="post" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label>Loại phòng</label>
                                        <input type="text" name="loai_phong" class="form-control"/>
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
    <!-- /. PAGE INNER  -->
    <!-- /. PAGE WRAPPER  -->
@stop
