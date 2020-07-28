<!DOCTYPE html>
<html>
<head>
	<title>Pabrik Gangsar | Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/managerproduksi/css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('/managerproduksi/favicon/favicon.ico') }}">
</head>
<body>
	<img class="wave" src="{{ asset('/managerproduksi/img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('/managerproduksi/img/bg.svg') }}">
		</div>
		<div class="login-content">
            <form action="{{ route('login') }}" method="POST">
                @csrf

				<img src="{{ asset('/managerproduksi/img/avatar.svg') }}">
				<h2 class="title">Login</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#">Lupa Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('/managerproduksi/js/login.js') }}"></script>
</body>
</html>
