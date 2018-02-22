@extends('admins.layouts.master')
@section('title',' Admin Permission Role')
@section('styles')
    <link rel="stylesheet" href="{{url('')}}/css/admin/admin.css">
    <!--  Material Dashboard CSS    -->
    <link href="{{url('')}}/css/admin/material-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" media="all" href="/css/admin/jvectorMap/jquery-jvectormap.css"/>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permission Role
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Permission Role</li>
        </ol>
    </section>
    <section class="content">
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Role Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Permission Name</th>
                                        @if(Auth::user()->can('permission-role-crud'))
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Permission Name</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach($permission_roles as $permission_role)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$i++}}</td>
                                            <td>{{ $permission_role->role()->name }}</td>
                                            <td>{{ $permission_role->permission()->name }}</td>
                                            @if(Auth::user()->can('permission-role-crud'))
                                                <td>
                                                    <a onclick="event.preventDefault();document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i></a>
                                                    <form id="delete-form" action="{{ route('admin.permission-role.destroy',$permission_role->permission_id) }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="role_id" value="{{$permission_role->role_id}}">
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">SL.</th>
                                        <th rowspan="1" colspan="1">Role Name</th>
                                        <th rowspan="1" colspan="1">Permission Name</th>
                                        @if(Auth::user()->can('permission-role-crud'))
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
        @if(Auth::user()->can('permission-role-crud'))
        <div class="col-xs-12 col-md-12">
            <h3>Add Permission on Role</h3>
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.permission-role.store') }}" method="POST">
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
                                <label>Permissions</label>
                                <select multiple="" class="form-control" name="permission[]">
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{ $permission->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label>Permission</label>--}}
                                {{--<select class="form-control" name="permission">--}}
                                    {{--@foreach($permissions as $permission)--}}
                                        {{--<option value="{{$permission->id}}">{{ $permission->display_name }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
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
    </section>
@stop

@section('styles')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
    </script>
@stop
