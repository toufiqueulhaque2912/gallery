<?php 
$nameError = "";
$emailerror = "";
$passwordError = "";
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($username)) {
        $nameError = "Name is required";
    } else {
        $username = trim($username);
        $username = htmlspecialchars($username);
        if(!preg_match("/^[a-zA-Z ]+$/", $username)) {
            $nameError = "<br>name should contain only char and space";
        }
    }
    if(empty($password)) {
        $passwordError = "<br>Password is required";
    } else {
        if(strlen($password) <=8){
            $passwordError = "<br> At least 8 digit";
        }elseif(!preg_match("#[0-9]+#" , $password)) {
            $passwordError = "<br>At least one digits";
        }elseif(!preg_match("#[a-z]+#" , $password)) {
            $passwordError = "<br>At least on small char";
        }elseif(!preg_match("#[A-Z]+#" , $password)) {
            $passwordError = "<br>At least on upper char";  
        }
    }

    if(empty($email)) {
        $emailError = "<br>Email is required";
    } else {
        if(strlen($email) <=8){
            $emailError = "<br> At least 8 digit";
        }elseif(!preg_match("#[0-9]+#" , $email)) {
            $emailError = "<br>At least one digits";
        }elseif(!preg_match("#[a-z]+#" , $email)) {
            $emailError = "<br>At least on small char";
        }elseif(!preg_match("#[A-Z]+#" , $email)) {
            $emailError = "<br>At least on upper char";  
        }
        
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="Style.css">

</head>
<body>

    <div class="container">
        <h3>Login Form </h3>
        <form method="post">
            
            <p class="input-box">
                <input type="text" name="username" placeholder="Username">
                <span style="color:red;"><?php echo $nameError ?></span>
            </p>

            <p class="input-box">
               <input type="text" name="email" placeholder="Email">
               <span style="color:red;"><?php echo $emailError ?></span>
             </p>

            <p class="input-box">
               <input type="password" name="password" placeholder="Password">
               <span style="color:red;"><?php echo $passwordError ?></span>
            </p>

            <p class="remember-forgot" >
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </p>

            <button type="submit" name='submit'>Login</button>
            <p class="register-link">Don't have an account? <a href="#">Register</a></p>
        </form>
    </div>
</body>
</html>
