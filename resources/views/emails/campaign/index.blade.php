@extends('admins.layouts.master')
@section('title',' Email Campaign')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            Email Campaign
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Email Campaign</li>
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Template</th>
                                        {{--@if(Auth::user()->can('permission-crud'))--}}
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th>
                                        {{--@endif--}}
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($campaigns as $campaign)
                                        <tr role="row" class="odd">
                                            <td>{{ $campaign->id }}</td>
                                            <td>{{ $campaign->title }}</td>
                                            <td>{{ $campaign->email->name }}</td>

                                            @if(Auth::user()->can('permission-crud'))
                                                <td>
                                                    <a href="{{route('admin.campaigns.show',$campaign->id)}}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="{{route('admin.campaigns.edit',$campaign->id)}}" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Display Name</th>
                                        <th rowspan="1" colspan="1">Description</th>
{{--                                        @if(Auth::user()->can('permission-crud'))--}}
                                            <th rowspan="1" colspan="1">Actions</th>
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
        @if(Auth::user()->can('permission-crud'))
            <div class="col-xs-12 col-md-12">
                <h3>Add Campaign</h3>
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.campaigns.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Template</label>
                                    <select name="template_id" class="form-control">
                                        <option value="">Please select a template</option>
                                        @foreach($templates as $template)
                                        <option value="{{$template->id}}">{{$template->name}}</option>
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

