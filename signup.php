
<?php
if(isset($_POST['submit'])){
  include 'database.php';
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $password =md5($_POST['password']);


  $sql = "INSERT INTO users (fname,lname,phone,email,password)
  VALUES ('$fname','$lname','$phone','$email','$password')";

  if ($connect->query($sql) === TRUE) {
      echo "User Registered Successfully";
      session_start();
      $_SESSION['sess_user']=$email;
      header("Location: home.php");
  } else {
      echo "Error: " . $sql . "<br>" . $connect->error;
  }

  $connect->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css">
<script type="text/javascript" src="signup.js">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-success navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="navbar-brand"><img src="thidiff-logo.png" alt="ThiDiff"></a>
      </li>
    </ul>
  </nav>


<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">REGISTRATION</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="form1" onsubmit="return validateform()" novalidate>

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname" id="fname"  placeholder="First Name" required/>
                  <div class="invalid-tooltip">
          Please choose a unique and valid username.
        </div>
                </div>
							</div>
						</div>

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="lname" id="lname"  placeholder="Last Name" required/>

        <div class="invalid-tooltip">
Please choose a Lastname.
</div>
                </div>
							</div>
						</div>

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone" id="phone"  placeholder="0123456789" maxlength="10"required/>
                  <div class="invalid-feedback">

        </div>
        <div class="invalid-tooltip">
Please choose a phone.
</div>
                </div>
							</div>
              <div id="numloc" style="color:red;"></div>
						</div>

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="user@example.com" required/>

        <div class="invalid-tooltip">
Please choose a email.
</div>
                </div>
							</div>
              <div id="mail" style="color:red;"></div>
						</div>

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Password" required/>

        <div class="invalid-tooltip">
Please choose a password.
</div>
                </div>
							</div>

						</div>

						<div class="form-group ">
              Alredy have an account?<a href="login.php" class="btn btn-info btn-link" role="button" style="color:green">Login.</a>
							<input type="submit" class="btn btn-success" value="Sign Up" name="submit">
						</div>

					</form>


				</div>
			</div>
		</div>
    <script>

    (function() {
      'use strict';
      window.addEventListener('load', function() {

        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

</body>
</html>
