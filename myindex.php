<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'lishat98';
$dbname = 'MINI_PROJECT';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($conn->connect_error) {
die('Could not connect: ' . $conn->connect_error);
}
if($_REQUEST['fname'] == "logging")
{
  $user = $_REQUEST['Username'];
  $password = $_REQUEST['Password'];
  $query = $conn->query("SELECT * FROM USER WHERE USERNAME = '$user' AND PASSWORD = '$password'");
  if($query->num_rows > 0)
  {
    header("Location: http://localhost/search.html"); 
    exit();
  }
  else
  {
    echo "<script>alert(\"You have not signed up. Please sign up.\");</script>";
  }
}
else if($_REQUEST['fname'] == "signing")
{
    $user = $_REQUEST['Signup_Username'];
    $email_id = $_REQUEST['Signup_Emailid'];
    $password = $_REQUEST['Signup_Password'];
    $confirmPassword = $_REQUEST['RSignup_Password'];
    if($password != $confirmPassword)
    {
        echo "<script>alert(\"The passwords don't match\");</script>";
    }
    else
    {
        $query = $conn->query("INSERT INTO USER(USERNAME, EMAIL_ID, PASSWORD) VALUES ('$user', '$email_id', '$password');");
        if($query)
        {
            header("Location: http://localhost/myindex.php");
        }
        else
        {
            echo "ERROR: ".$sql."<br>".$conn->error;
        }
        exit();
    }
}
$conn->close();
 ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/0.3.7/awesome-bootstrap-checkbox.min.css">	
	<style>
			@import url(https://fonts.googleapis.com/css?family=Varela);
.login{
  background-image:url("http://www.hanedanrpg.com/photos/hanedanrpg/20/96509.jpg");
  background-repeat:no-repeat;
  background-size:cover;
}
html {
  height: 100%;
}
body {
  font-family: 'Varela', sans-serif;
  font-size: 14px;
  line-height: 1.5;
  color: #333;
  min-height: 100%;
  position: relative;
  width:100%;
  height:100%;
  overflow:hidden;
}
label {
  margin-bottom: 0;
}

a {
  color: #e1e1e1;
}

a:focus,
a:hover {
  color: #008080;
}

.checkbox-inline+.checkbox-inline,
.radio-inline+.radio-inline {
  margin-top: 6px;
}

body.login {
  background: rgba(255, 255, 255, 1);
}

.relative {
  position: relative;
}
.switcher{
  margin-bottom:70px;
}
ul.switcher li{
	list-style-type: none;
	width:50%;
  position:absolute;
  top:0;
}
.first{
  left:0;
}
.second{
  right:0;
}
.login-container-wrapper {
  max-width: 400px;
  margin: 2% auto 5%;
  padding: 40px;
  box-sizing: border-box;
  background: rgba(57, 89, 116, 0.8);
  position: relative;
  box-shadow: 0px 30px 60px -5px #000;
  background-image:url('http://www.planwallpaper.com/static/images/colorful-triangles-background_yB0qTG6.jpg');
  background-size:cover;
  background-blend-mode:saturation;
}
.login-container-wrapper .logo,
.login-container-wrapper .welcome {
  font-size: 16px;
  letter-spacing: 1px;
}
.login-container-wrapper li {
  text-align: center;
  padding:0 15px;
  background-color: #283443;
  height:50px;
  line-height:50px;
  box-shadow: inset 0 -2px 0 0 #ccc;
  cursor:pointer;
}
.login-container-wrapper li a{
   color:#fff;
}
.login-container-wrapper li a:hover{
  color:#ccc;
  text-decoration:none;
}

.login-container-wrapper li a:active,
.login-container-wrapper li a:focus{
  color:#fff;
  text-decoration:none;
}
.login-container-wrapper li.active{
  background-color:transparent;
  box-shadow:none;
}
.login-container-wrapper li.active a{
  border-bottom:2px solid #fff;
  padding-bottom:5px;
}

.login input:focus + .fa{
  color:#25a08d;
}
.login-form .form-group {
  margin-right: 0;
  margin-left: 0;
}

.login-form i {
  position: absolute;
  top: 0;
  left: 19px;
  line-height:52px;
  color: rgba(40, 52, 67, 1);
  z-index:100;
  font-size:16px;
}

.login-form .input-lg {
  font-size: 16px;
  height: 52px;
  padding: 10px 25px;
  border-radius: 0;
}

.login input[type="email"],
.login input[type="password"],
.login input[type="number"],
.login input[type="text"],
.login input:focus {
  background-color: rgba(40, 52, 67, 0.75);
  border: 0px solid #4a525f;
  color: #eee;
  border-left: 45px solid #93a5ab;
  border-radius:40px;
}

.login input:focus {
  border-left: 45px solid #eee;
}

input:-webkit-autofill,
textarea:-webkit-autofill,
select:-webkit-autofill {
  background-color: rgba(40, 52, 67, 0.75)!important;
  background-image: none;
  color: rgb(0, 0, 0);
  border-color: #FAFFBD;
}

.btn-success {
  background-color: #25a08d;
  background-image: none;
  padding: 8px 50px;
  margin-top:20px;
  border-radius: 40px;
  border: 1px solid #25a08d;
  -webkit-transition: all ease 0.8s;
  -moz-transition: all ease 0.8s;
  transition: all ease 0.8s;
}

.btn-success:focus,
.btn-success:hover,
.btn-success.active,
.btn-success.active:hover,
.btn-success:active:hover,
.btn-success:active:focus,
.btn-success:active {
  background-color: #25a08d;
  border-color: #25a08d;
  box-shadow: 0px 5px 35px -5px #25a08d;
  text-shadow:0 0 8px #fff;
  color: #FFF;
  outline:none;
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
	
	$('ul.switcher li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('li').removeClass('active');
    $('div.tab-pane').removeClass('active');

		$(this).addClass('active');
		$("#"+tab_id).addClass('active');
	})

})
</script>
</head>
<body class="login">
	<div class="container">
		<div class="login-container-wrapper clearfix">
			<ul class="switcher clearfix">
				<li class="first logo active" data-tab="login">					
						<a>Login</a>			
				</li>
				<li class="second logo" data-tab="sign_up">
						<a>Sign Up</a>	
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="login">
					<form name = "login" class="form-horizontal login-form" method="post" action="<?php $_PHP_SELF?>">
						<div class="form-group relative">
							<input class="form-control input-lg" id="login_username" placeholder="Username" name="Username" id="Username" required="" type="text"> <i class="fa fa-user"></i>
						</div>
						<div class="form-group relative">
							<input class="form-control input-lg" id="login_password" placeholder="Password" required="" type="password"  name="Password" id="Password"> <i class="fa fa-lock"></i>
            </div>
						<div class="form-group">
							<button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
            </div>
            <input type="hidden" name = "fname" value = "logging">
					</form> 
				</div>
				<div class="tab-pane" id="sign_up">
					<form name = "signup" class="form-horizontal login-form" method = "post" action = "<?php $_PHP_SELF?>">
						<div class="form-group relative">
							<input class="form-control input-lg" id="login_username" placeholder="Username" name = "Signup_Username" required="" type="text"> <i class="fa fa-user"></i>
						</div>
						<div class="form-group relative">
							<input class="form-control input-lg" id="login_username" placeholder="E-mail Address" name = "Signup_Emailid" required="" type="email"> <i class="fa fa-user"></i>
						</div>
						<div class="form-group relative">
							<input class="form-control input-lg" id="login_password" placeholder="Password" name = "Signup_Password" required="" type="password"> <i class="fa fa-lock"></i>
						</div>
						<div class="form-group relative">
							<input class="form-control input-lg" id="login_password" placeholder="Confirm Password" name = "RSignup_Password" required="" type="password"> <i class="fa fa-lock"></i>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-lg btn-block" type="submit">Sign Up</button>
            </div>
            <input type = "hidden" name = "fname" value="signing">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
