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
				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Police ID is required">
						<input class="input100" type="text" name="police-id" placeholder="Police ID">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="psswd" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button  type="button" class="login100-form-btn" onclick="location.href='{{ url('home') }}'">
							Sign In 
						</button>
					</div>
				</form>
			</div>
        </div>
@endsection        