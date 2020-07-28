<!DOCTYPE html>
<html>
<head>
	<title>Pabrik Gangsar | Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/managerproduksi/css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="{{ asset('/managerproduksi/img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('/managerproduksi/img/bg.svg') }}">
		</div>
		<div class="login-content">
            <form action="{{ url('/change-password') }}" method="POST">
                @csrf

				<img src="{{ asset('/managerproduksi/img/avatar.svg') }}">
				<h2 class="title">Change Password</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Password Baru</h5>
           		   		<input type="password" class="input" id="pass1">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Konfirmasi Password</h5>
           		    	<input type="password" class="input" name="password" id="pass2" oninput="check()">
            	   </div>
            	</div>
              <p style="color: red; display: none;" id="alert">Password tidak sesuai</p>
            	<input type="submit" class="btn" value="Submit" id="button">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('/managerproduksi/js/login.js') }}"></script>
    <script type="text/javascript">
      function check(){
        console.log("masuk function");
        if(document.getElementById("pass1").value != document.getElementById("pass2").value){
          document.getElementById("alert").style.display = 'block';
          document.getElementById("button").setAttribute('disabled',true);
        }
        else{
          console.log("masuk else");
          document.getElementById("alert").style.display = 'none';
          document.getElementById("button").removeAttribute("disabled");
        }
      }
    </script>
</body>
</html>
