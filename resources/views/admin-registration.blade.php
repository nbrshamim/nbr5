@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Signup
				</div>
				<div class="panel-body">
			        @if(Session::has('flash_message_error'))
			            <div class="alert alert-error alert-block">
			                <button type="button" class="close" data-dismiss="alert">x</button>
			                <strong>{!! session('flash_message_error') !!}</strong>
			            </div>
			        @endif
			        @if(Session::has('flash_message_success'))
			            <div class="alert alert-success alert-block">
			                <button type="button" class="close" data-dismiss="alert">x</button>
			                <strong>{!! session('flash_message_success') !!}</strong>
			            </div>
			        @endif

					<form method="POST" action="" aria-label="{{ __('Register') }}">
					{{csrf_field()}}
					<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="User Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

					<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

					<div class="form-group row">
                            <label for="userpassword" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="userpassword" type="password" class="form-control{{ $errors->has('userpassword') ? ' is-invalid' : '' }}" name="userpassword" placeholder="Password" required>

                                @if ($errors->has('userpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 pull-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
