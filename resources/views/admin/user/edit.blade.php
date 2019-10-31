@extends('templates.admin.master')
@section('main')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa user </h2>
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
                                <form role="form" action="{{route('admin.user.postEdit')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}" class="form-control"/>
                                    <div class="form-group">
                                        <label>User name</label>
                                        <input type="text" name="username" value="{{$user->username}}"
                                               class="form-control" disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" value="{{$user->fullname}}"
                                               class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            @foreach($listRole as $role)
                                                <option
                                                    value="{{$role->id}}"
                                                @if($role->id == $user->role_id)
                                                    {{'selected'}}
                                                    @endif
                                                >{{$role->role}}
                                                </option>
                                            @endforeach
                                        </select>
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
    </div>
    <!-- /. PAGE WRAPPER  -->
@stop
