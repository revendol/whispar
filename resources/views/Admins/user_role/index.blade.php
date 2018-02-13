@extends('adminlte::page')

@section('title', 'Admin Permission-Role')

@section('content_header')
    @include('Admins.partials._error')
    <h1>User & Roles</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SL.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >User Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >User Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Role Name</th>
                                        {{--Need to apply can make action--}}
                                        @if(Auth::user()->can('user-role-crud'))
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Actions</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach($user_roles as $user_role)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$i++}}</td>
                                            <td>{{ $user_role->user()->name }}</td>
                                            <td>{{ $user_role->user()->email }}</td>
                                            <td>{{ $user_role->role()->name }}</td>
                                            {{--Need to apply can make action--}}
                                            @if(Auth::user()->can('user-role-crud'))
                                            <td>
                                                <a href="{{ route('admin.user-role.edit',$user_role->user_id) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a onclick="event.preventDefault();document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i></a>
                                                <form id="delete-form" action="{{ route('admin.user-role.destroy',$user_role->user_id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="role_id" value="{{$user_role->role_id}}">
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">SL.</th>
                                        <th rowspan="1" colspan="1">User Name</th>
                                        <th rowspan="1" colspan="1">User Email</th>
                                        <th rowspan="1" colspan="1">Role Name</th>
                                        {{--Need to apply can make action--}}
                                        @if(Auth::user()->can('user-role-crud'))
                                        <th rowspan="1" colspan="1">Actions</th>
                                        @endif
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        @if(Auth::user()->can('user-role-crud'))
             <div class="col-xs-12 col-md-12">
            <h3>Provide User Role</h3>
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.user-role.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control" name="user">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
    </script>
@stop
