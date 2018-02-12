@if($errors->has('name'))
     <h4>{{ $errors->first('name') }}</h4>

@endif
@if($errors->has('display_name'))
     <h4>{{ $errors->first('display_name') }}</h4>
@endif