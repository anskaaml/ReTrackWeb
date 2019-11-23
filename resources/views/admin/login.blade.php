@extends('login.index')

@section('title')
    ReTrack
@endsection

@section('content')
<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic">			
				<span class="login-title">ReTrack</span>
					<img src="assets/img/logo.png">
				</div>
				<form method="POST" action="{{ route('testLogin') }}" class="login100-form">
					@csrf
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Police ID is required">
						<input class="input100" type="text" name="user_employee_id" placeholder="Police ID" value="{{ old('user_employee_id') }}">
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input101" type="password" name="user_password" placeholder="Password">
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Sign In 
						</button>
					</div>
				</form>
			</div>
        </div>
@endsection        