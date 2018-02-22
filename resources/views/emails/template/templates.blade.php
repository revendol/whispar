@extends('Admins.layouts.master')
@section('title',' Email Templates')

@section('styles')
    <link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section('content')
    @include('Admins.partials._error')
    <section class="content-header">
        <h1>
            Email Templates
            <small>Control panel</small>
        </h1>
        @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Email Templates</li>
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Subject</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Macros</th>
                                        {{--@if(Auth::user()->can('permission-crud'))--}}
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th>
                                        {{--@endif--}}
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i = 1; ?>
                                    @foreach($templates as $template)
                                        <tr id="trolic-">
                                            <td>{{$i++}}</td>
                                            <td> {{$template->name}} </td>
                                            <td> {{$template->subject}} </td>
                                            <td> {{ $template->macros }} </td>
                                            <td class="text-center">
                                                <span>
                                                    <a href="{{route('admin.templates.show',$template->id)}}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{route('admin.templates.edit',$template->id)}}" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a onclick="event.preventDefault();document.getElementById('delete-form{{$template->id}}').submit();" title="Delete"><i class="fa fa-trash"></i></a>
                                                    <form id="delete-form{{$template->id}}" action="{{ route('admin.templates.destroy',$template->id) }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Subject</th>
                                        <th rowspan="1" colspan="1">Macros</th>
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
                <h3>Add Template</h3>
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="{{ route('admin.templates.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-body">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="name" class="form-control capital" placeholder="Enter Name Here..." value="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Subject</label>
                                        <input type="text" name="subject" class="form-control capital" placeholder="Enter Subject Here..." value="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea id="description" name="description" class="form-control" rows="10">{{!empty(old('short_description')) ? old('short_description') : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Macros</label>
                                        <input type="text" name="macros" class="form-control capital" placeholder="Enter Mecros Here..." value="">
                                    </div>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
    </script>
    <script src="{{url('')}}/js/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with an CKEditor instance.
        CKEDITOR.replace('description',
            {
                on:
                    {
                        // Check for availability of corresponding plugins.
                        pluginsLoaded: function(evt)
                        {
                            var doc = CKEDITOR.document,
                                ed = evt.editor;
                            if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                            if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                        }
                    }
            });
    </script>

@stop

