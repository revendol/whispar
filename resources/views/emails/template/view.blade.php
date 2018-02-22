@extends('Admins.layouts.master')
@section('title',' Email Templates')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            View Email Templates
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Email Templates</li>
        </ol>
    </section>
    <section class="content">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">

        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_2" style="padding: 20px 0 0 20px;">
                <tbody>
                <tr>
                    <td>Name:</td>
                    <td>{{ $template->name }}</td>
                </tr>
                <tr>
                    <td>Subject:</td>
                    <td>{{$template->subject}}</td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><iframe src="{{ route('admin.email.raw', $template->id) }}" width="800" height="400"></iframe></td>
                    {{--<td>{!! $template->description !!}</td>--}}
                </tr>
                <tr>
                    <td>Macros:</td>
                    <td>{{$template->macros}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </section>
    <!-- END EXAMPLE TABLE PORTLET-->
@stop

