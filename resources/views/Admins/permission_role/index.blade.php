@extends('adminlte::page')

@section('title', 'Admin Permission-Role')

@section('content_header')
    <h1>Permission & Roles</h1>
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Role Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Permission Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach($permission_roles as $permission_role)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$i++}}</td>
                                            <td>{{ $permission_role->role()->name }}</td>
                                            <td>{{ $permission_role->permission()->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">SL.</th>
                                        <th rowspan="1" colspan="1">Role Name</th>
                                        <th rowspan="1" colspan="1">Permission Name</th>
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
        <div class="col-xs-12 col-md-12">
            <h3>Add Permission on Role</h3>
            @include('Admins.partials._error')
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
