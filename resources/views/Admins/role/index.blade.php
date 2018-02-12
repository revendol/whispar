@extends('adminlte::page')

@section('title', 'Admin Role')

@section('content_header')
    <h1>Roles</h1>
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
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Display name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Created At</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Updated At</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach($roles as $role)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$i++}}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>{{ date('D, M Y, H:i a',strtotime($role->created_at)) }}</td>
                                            <td>{{ date('D, M Y, H:i a',strtotime($role->updated_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a onclick="event.preventDefault();document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i></a>
                                                <form id="delete-form" action="{{ route('admin.roles.destroy',$role->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">SL.</th>
                                        <th rowspan="1" colspan="1">Display Name</th>
                                        <th rowspan="1" colspan="1">Description</th>
                                        <th rowspan="1" colspan="1">Created At</th>
                                        <th rowspan="1" colspan="1">Updated At</th>
                                        <th rowspan="1" colspan="1">Actions</th>
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
            <h3>Add Role</h3>
            @include('Admins.partials._error')
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.roles.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display Name</label>
                                <input type="text" class="form-control" name="display_name" placeholder="Display Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="description" id="Description"  rows="1"></textarea>
                                {{--<input type="text" class="form-control" placeholder="Display Name">--}}
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
