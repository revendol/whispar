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

        <div class="col-xs-12 col-md-12">
            <h3>Add User</h3>
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.add.user') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Password" onkeyup="passlength(this.value)" onkeydown="passlength(this.value)">
                                <p class="help-block" id="pass_length"></p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" onkeyup="confirmationPassword(this.value)" onkeydown="confirmationPassword(this.value)">
                                <p class="help-block" id="confirmation_password"></p>
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
@section('css')
    <link rel="stylesheet" href="/css/admin/admin.css">
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
        function confirmationPassword(val) {
            var pas = $('#password').val();
            if(pas === val){
//                document.getElementById('confirmation_password').innerHTML = "Password matched.";
                $('#confirmation_password').text("Password matched.");
                $('#confirmation_password').css("color",'green');

            } else {
                $('#confirmation_password').text("Password didn't match!!");
                $('#confirmation_password').css("color",'red');
            }
        }
        function passlength(val) {
            if(val.length<6){
                $('#pass_length').text("Minimum 6 character required.");
                $('#pass_length').css("color",'red');
            } else {
                $('#pass_length').text("");
            }
        }
    </script>
@stop
