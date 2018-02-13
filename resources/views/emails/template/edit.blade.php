@extends('adminlte::page')

@section('title', 'Email Template')

@section('content_header')
    @include('Admins.partials._error')
    <h1><i class="fa fa-paper-plane-o"></i> &nbsp;&nbsp;Email Templates </h1>
@stop



@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('admin.templates.update',$template->id) }}" id="news_add" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <div class="form-body" style="margin-bottom: 20px;">
                                        <div class="col-xs-12">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" style="width: 100%;" class="form-control" placeholder="Enter Name Here..." value="{{!empty(old('name')) ? old('name') : $template->name}}">
                                        </div>
                                        <div class="col-xs-12">
                                            <label class="control-label">Subject</label>
                                            <input type="text" name="subject" style="width: 100%;" class="form-control" placeholder="Enter Subject Here..." value="{{!empty(old('subject')) ? old('subject') : $template->subject}}">
                                        </div>

                                        <div class="col-xs-12">
                                            <label class="control-label">Description</label>
                                            <textarea id="description" name="description" class="form-control" rows="10">{{!empty(old('description')) ? old('description') : $template->description }}</textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <label class="control-label">Macros</label>
                                            <input type="text" name="macros" style="width: 100%;" class="form-control capital" placeholder="Enter Mecros Here..." value="{{!empty(old('macros')) ? old('macros') : $template->macros}}">
                                        </div>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection

@section('js')

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

