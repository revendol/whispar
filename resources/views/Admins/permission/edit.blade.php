@extends('adminlte::page')

@section('title', 'Admin Permission')

@section('content_header')
    <h1>Update Permission</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            @include('Admins.partials._error')
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
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$permission->name}}">
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
@stop

