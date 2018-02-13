@extends('layouts.app')


@section('breadcrumbs')
    <h1 class="page-title"> Campaign
        <small>Recent Campaign</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>
            <a href="#">Emails</a>
            <i class="fa fa-circle"></i>
        </li>
        <li class="active">Campaign</li>
    </ol>
@endsection


@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green" >
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" style="margin: 0 20px 0px 0px;font-size: 20px;"></i> Create Campaign </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <form method="POST" action="{{ route('admin.email.campaigns.store') }}" id="news_add">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <input type="text" name="title" class="form-control capital" placeholder="Enter Title Here..." value="">
                    </div>

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

