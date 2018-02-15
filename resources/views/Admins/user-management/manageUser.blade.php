@extends('adminlte::page')

@section('title', 'Admin Role')

@section('content_header')
    @include('Admins.partials._error')
    <h1>Manage User</h1>
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Username</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Suspension Status</th>
                                        {{--@if(Auth::user()->can('role-crud'))--}}
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >
                                            Actions
                                        </th>
                                        {{--@endif--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach($users as $user)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$i++}}</td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->status?'Verified':'Unverified' }}</td>
                                            <td>{{ $user->suspension_status?'Suspended':'Active' }}</td>
                                            {{--@if(Auth::user()->can('role-crud'))--}}
                                            <td>
                                                <a href="{{ route('admin.edit.user',$user->id) }}" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="{{ route('admin.suspend.user',$user->id) }}" @if($user->suspension_status) title="Remove Suspension" @else title="Suspend" @endif ><i class="fa @if($user->suspension_status) fa-check @else fa-ban @endif"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a onclick="event.preventDefault();document.getElementById('delete-form{{$user->id}}').submit();" title="Delete"><i class="fa fa-trash"></i></a>
                                                <form id="delete-form{{$user->id}}" action="{{ route('admin.delete.user',$user->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                            {{--@endif--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">SL.</th>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Username</th>
                                        <th rowspan="1" colspan="1">Email</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Suspension Status</th>
                                        {{--@if(Auth::user()->can('role-crud'))--}}
                                        <th rowspan="1" colspan="1">Actions
                                        {{--@endif--}}
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
