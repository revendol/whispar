@extends('admins.layouts.master')
@section('title',' Admin user role')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            Edit user roles
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit user roles</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        @if(Auth::user()->can('provide-user-role'))
            <div class="col-xs-12 col-md-12">

                <h4>Update role for <strong>{{$user->name}}</strong></h4>
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.user-role.update',$user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($role->id == $user->role()->role_id) selected @endif>{{ $role->display_name }}</option>
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
    </section>
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
    </script>
@stop
