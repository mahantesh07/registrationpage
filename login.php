<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
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
        <div class="main-login main-center">
          <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="form1">
            <fieldset>
              <div id="legend">
			      <legend class="">LOGIN</legend>
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
            Create a new account<a href="signup.php" class="btn btn-info btn-link" role="button" style="color:green">Sign up.</a>
            <input type="submit" class="btn btn-success" value="Sign in">
          </div>
          </fieldset>
          </form>
          <?php
          // define variables and set to empty values
          $email = $password = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);
          }

          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          ?>
          <?php include 'database.php';?>
          <?php
          if (!empty($_POST['email'])&&!empty($_POST['password'])) {
            $password =md5($_POST['password']);

            $query="SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
            $result=mysqli_query($connect,$query);
            $numrows=mysqli_num_rows($result);
            if($numrows!=0)
            {
              while($row=mysqli_fetch_assoc($result))
              {
                $dbusername=$row['email'];
                $dbpassword=$row['password'];
              }
              if($email == $dbusername && $password == $dbpassword)
              {
                session_start();
                $_SESSION['sess_user']=$email;

                /* Redirect browser */
                header("Location: home.php");
              }
              } else {
              echo "<p style=\"color:#ff0033;\">Invalid username or password!</p> <br/>";
              }
          }
          $connect->close();

          ?>
        </div>
      </div>
    </div>

  </body>
</html>
