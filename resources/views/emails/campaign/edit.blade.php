@extends('Admins.layouts.master')
@section('title','Email Campaign')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            Update Email Campaign
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Email Campaign</li>
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
                                <form method="post" action="{{ route('admin.campaigns.update',$campaign->id) }}" id="news_add">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <div class="form-body">
                                        <div class="row" style="margin-bottom: 40px;">
                                            <div class="col-xs-6 col-sm-4 col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Title</label><br>
                                                    <input type="text" name="title" class="form-control" disabled value="{{$campaign->title}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Template ID</label>
                                                    <div class="input-group" style="width: 100%;">
                                                        <select name="template_id" class="form-control">
                                                            @foreach($templates as $template)
                                                                <option value="{{$template->id}}">{{$template->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-actions">
                                        <div class="btn-set pull-left">
                                            <button type="submit" class="btn green">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    </section>
@stop
