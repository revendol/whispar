@extends('admins.layouts.master')
@section('title',' Admin Edit user')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            Edit user
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit user</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.update.user',$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Display Name" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Display Name" value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <label for="">Verified status</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" name="verified_status" id="verified-status-check-box" @if($user->status) checked @endif>
                                </span>
                                <input type="text" class="form-control" id="verified-status-input" disabled="true" value="@if($user->status) Verified @else Unverified @endif">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <label for="">Suspension Status</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" name="suspension_status" id="suspension-status-check-box" @if($user->suspension_status) checked @endif>
                                </span>
                                <input type="text" class="form-control" id="suspension-status-input" disabled="true" value="@if($user->suspension_status) Suspended @else Active @endif ">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin/admin.css">
@stop
@section('js')
    <script>
        $('#verified-status-check-box').change(function () {
            if(this.checked) {
                $('#verified-status-input').val('Verified');
            } else {
                $('#verified-status-input').val('Unverified');
            }

        });
        $('#suspension-status-check-box').change(function () {
            if(this.checked) {
                $('#suspension-status-input').val('Suspended');
            } else {
                $('#suspension-status-input').val('Active');
            }

        });
    </script>
@stop
