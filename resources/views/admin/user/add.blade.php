@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm user</h2>
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
                                <form role="form" action="{{route('admin.user.postAdd')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select class="form-control" name="role_id">
                                            @foreach($listRole as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                            @endforeach
                                        </select>
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
@stop
<!-- /. PAGE WRAPPER  -->
