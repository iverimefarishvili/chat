<!DOCTYPE html>
<html>
<title>Login Form</title>
<head>
<?php


if (isset($_POST['login'])) {
    
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $error = array();
     if (empty($username)) {
         array_push($error, "Username is required");
     }
     if (empty($password)) {
         array_push($error, "Password is required");
     }
   
     if (count($error) == 0) {
         
         $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
         $results = mysqli_query($conn, $query);
         if (mysqli_num_rows($results) == 1) {
           session_start();
           $_SESSION['username'] = $username;
             
           $_SESSION['success'] = "You are now logged in";
           header('location: chat.php');
         }else {
             array_push($error, "Wrong username/password combination");
         }
     }
   }
   
   

session_start();

if (isset($_POST["submit"])){
    
    $firstname= mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname= mysqli_real_escape_string($conn, $_POST["lastname"]);
    $birthday= mysqli_real_escape_string($conn, $_POST["birthday"]);
    $username=mysqli_real_escape_string($conn, $_POST["username"]);
    $password1=mysqli_real_escape_string($conn, $_POST["password"]);
    $password2=mysqli_real_escape_string($conn, $_POST["retype password"]);
  
    $errors = array();

  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($birthday)) { array_push($errors, "Birthday is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if (empty($password2)) { array_push($errors, "Password is required"); }
  
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  $sql = "Select * FROM user WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  if (count($errors) == 0) {
    

  	$query = "insert into user (firstname,lastname,birthday,username,password) values ('$firstname','$lastname','$birthday','$username','$password1')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    header('location:chat.php');
    
  }
}
?>
<style>
body {
    background: url('2.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

.login-block {
    width: 320px;
    padding: 20px;
    border-radius: 5px;
    margin: 110px auto;
	background:#fff;
    border-top: 5px solid #ff656c;
}

.firstname,.lastname,.birthday,.username,.password1,.password2,.password{
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.firstname {
    background: #fff url('5.png') 20px top no-repeat;
    background-size: 16px 80px;
}
.firstname:focus {
    background: #fff url('5.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}
.lastname {
    background: #fff url('5.png') 20px top no-repeat;
    background-size: 16px 80px;
}
.lastname:focus {
    background: #fff url('5.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}


}
.username {
    background: #fff url('4.png') 20px top no-repeat;
    background-size: 16px 80px;
}
.username:focus {
    background: #fff url('4.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.password1 {
    background: #fff url('3.png') 20px top no-repeat;
    background-size: 16px 80px;
}
.password1:focus {
    background: #fff url('3.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}
.password2 {
    background: #fff url('3.png') 20px top no-repeat;
    background-size: 16px 80px;
}
.password2:focus {
    background: #fff url('3.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}
.login-block input:active, .login-block input:focus {
    border: 1px solid #5C82A2;
}

.login,.submit {
    width: 100%;
    height: 40px;
    background: #5C82A2;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #5C82A2;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}
.login:hover,.submit:hover {
    background: #4985BA;
}

.logo{
    width:120px; 
    height:120px; 
    margin:auto; 
    border:5px solid #fff;
    border-radius:50%; 
    margin-bottom:20px;
}
.logo img{
    width:100%; 
    height:100%; 
    border-radius:50%
} 
#hide,#show{
    cursor:pointer
}
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
$(document).ready(function(){
	$(".register-box").hide();    
    $("#show").click(function(){
		$(".login-box").hide();
        $(".register-box").fadeIn(200);
    });
	$("#hide").click(function(){
		$(".login-box").fadeIn(200);
        $(".register-box").hide();
    });
});
</script>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<div class="login-block">

    <div class="logo">
    	<img src="23.jpg"/>
    </div>
		<?php if (isset($_POST["submit"]) and $errors > 0){
		echo '<div class="alert alert-danger" role="alert" style="text-align:center">';
			foreach ($errors as $error) {
			echo $error.'<br>';
		}
		echo '</div>';
	}?>
    <?php 
    if (isset($_POST["login"]) and $error > 0){
		echo '<div class="alert alert-danger" role="alert" style="text-align:center">';
			foreach ($error as $err) {
			echo $err.'<br>';
		}
		echo '</div>';
	}?>
	<div class="login-box">
    <form action="index.php" method="post">
	    <input type="text" placeholder="Username" id="username" name="username" class="username"/>
	    <input type="password" placeholder="Password" id="password" name="password" class="password"/>
	    <input type="submit" value="login" id="login" name="login" class="login"/>
   </form>
	<p style="text-align:center; font-size:14px">Not registered ? <strong style="color:#5C82A2" id="show" >Create an account</strong></p>
	</div>
	
	<div class="register-box">
		<form action="index.php" method="post">    
	    <input type="text" placeholder="firstname" id="firstname" name="firstname" class="firstname"/>
        <input type="text" placeholder="lastname" id="lastname" name="lastname" class="lastname"/>
        <input type="date" placeholder="birthday" id="birthday" name="birthday" class="birthday"/>
    	<input type="text" placeholder="username" id="username" name="username" class="username" />
	    <input type="password" placeholder="password" id="password" name="password" class="password" />
        <input type="password" placeholder="retype password" id="retype password" name="retype password" class="retype password" />
		<input type="submit" value="Register" id="submit" name="submit" class="submit"/>
	</form>
    <p style="text-align:center; font-size:14px">Have an account ? <strong style="color:#5C82A2" id="hide">Sign In</strong></p>
	</div>
    <div id="user_details"></div>
    
</div>

</body>
</html>
<script>

</script>