@extends('layouts.app')


@section('breadcrumbs')
    <h1 class="page-title"> Templates
        <small>Recent Templates</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>
            <a href="#">Emails</a>
            <i class="fa fa-circle"></i>
        </li>
        <li class="active">Create Templates</li>
    </ol>
@endsection


@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-paper-plane-o" style="margin-right: 20px;font-size: 20px;"></i>Create Templates </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <form method="POST" action="{{ route('admin.templates.store') }}" id="news_add" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" class="form-control capital" placeholder="Enter Name Here..." value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <input type="text" name="subject" class="form-control capital" placeholder="Enter Subject Here..." value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea id="description" name="description" class="form-control" rows="10">{{!empty(old('short_description')) ? old('short_description') : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Macros</label>
                        <input type="text" name="macros" class="form-control capital" placeholder="Enter Mecros Here..." value="">
                    </div>
                </div>

                <div class="form-actions">
                    <div class="btn-set pull-left">
                        <button type="submit" class="btn green">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin/admin.css">
@stop
