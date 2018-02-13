@extends('adminlte::page')

@section('title', 'Email Template')

@section('content_header')
    @include('Admins.partials._error')
    <h1><i class="fa fa-globe"></i> &nbsp;&nbsp;Email Templates </h1>
@stop

@section('content')
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
    <!-- END EXAMPLE TABLE PORTLET-->
@stop

