@if($errors->has('name'))
     <h4>{{ $errors->first('name') }}</h4>

@endif
@if($errors->has('display_name'))
     <h4>{{ $errors->first('display_name') }}</h4>
@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-check"></i> Alert!</h4>
     {{ Session::get('success') }}
</div>
@endif