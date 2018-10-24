@extends('layouts.main')
@section('title','The Assignment Makers - Login')
@section('description','Login at The Assignment Makers to get best paper work at reasonable price')
@section('css')
<style>
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
		padding-top:100px;
		padding-bottom:120px;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 20%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
	#Wrapper{
		    background: linear-gradient( rgb(73, 60, 140,0.20), rgb(93, 90, 105,0.40) ), url(https://images.pexels.com/photos/207662/pexels-photo-207662.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260);
	}

	 .help-block > strong{
        color:red;
    }
</style>
</style>
@endsection

@section('content')


<div class="signup-form">
    <form action="{{ route('login') }}" method="POST">
    	 {{ csrf_field() }}
		<h2>Login</h2>
		<p class="hint-text">Login to your existing account</p>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"">
        	<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>

        	@if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"">
            <input type="password" class="form-control" name="password" placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
        </div>

       	 <div class="form-group">
       	 	<div class="text-center">
            <label class="checkbox-inline"><input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
        	</div>
        </div>
        <hr >
        <div class="text-center">Don't have an account? <a href="/register">Register</a></div>
    </form>
	
</div>


@endsection


@section('footer')

@endsection