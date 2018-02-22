@extends('Admins.layouts.master')
@section('title','View Email Campaign')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            View Email Campaign
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Email Campaign</li>
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
                                <table class="table table-striped table-bordered table-hover" id="sample_2" style="padding: 20px 0 0 20px;">
                                    <tbody>
                                    <tr>
                                        <td>Title:</td>
                                        <td>{{$campaign->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email Name:</td>
                                        <td>{{$campaign->email->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email Subject:</td>
                                        <td>{{$campaign->email->subject}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email Description:</td>
                                        <td><iframe src="{{ route('admin.email.raw', $campaign->email->id) }}" width="800" height="400"></iframe></td>
                                        {{--                    <td>{!! $campaign->email->description !!}</td>--}}
                                    </tr>
                                    <tr>
                                        <td>Email Macros:</td>
                                        <td>{{ $campaign->email->macros }}</td>
                                    </tr>
                                    </tbody>
                                </table>
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

