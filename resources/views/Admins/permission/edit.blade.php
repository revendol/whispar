@extends('Admins.layouts.master')
@section('title',' Admin Permission')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            Permission
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Permission</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.permissions.update',$permission->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" disabled="true" placeholder="Name" value="{{$permission->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display Name</label>
                                <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{$permission->display_name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="description" id="Description"  rows="1">{{$permission->description}}</textarea>
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
    </section>
@stop
