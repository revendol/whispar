{{--Registration and login errors--}}
@if($errors->has('name'))
    <div class="col-xs-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ $errors->first('name') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if($errors->has('email'))
    <div class="col-xs-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ $errors->first('email') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if($errors->has('password'))
    <div class="col-xs-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ $errors->first('password') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

{{--Password reset link success--}}
@if (session('status'))
    <div class="col-xs-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>  {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif