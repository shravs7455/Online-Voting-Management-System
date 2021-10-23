<?php
    session_start();

    $username="";
    $email="";
    $errors=array();
    $db	=mysqli_connect("localhost","root","","registration");
    if(isset($_POST['register'])){
    	$username= mysqli_real_escape_string($db,$_POST['username']);
    	$email= mysqli_real_escape_string($db,$_POST['email']);
    	$aadhar= mysqli_real_escape_string($db,$_POST['aadhar']);
    	$password_1= mysqli_real_escape_string($db,$_POST['password_1']);
    	$password_2= mysqli_real_escape_string($db, $_POST['password_2']);
    	if(empty($username)) {
    		array_push($errors, "Username is required");

    	}
    	if(empty($email)) {
    		array_push($errors,"Email is required");
        }
        if(empty($aadhar)) {
    		array_push($errors, "Aadhar Card number is required");
    	}
    	if(empty($password_1)) {
    		array_push($errors, "Password is required");
    	}
    	#if(empty($password_1 != $password_2)) {
    	#	array_push($errors, "Two Passwords do not match");
    	#}
    	if(count($errors)==0){
    		$password=md5($password_1); //for security
    		$sql ="INSERT INTO users(username,email,password) 
    		VALUES ('$username','$email','$aadhar','#password')";
            mysqli_query($db,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
    	}

    	//log user in
    if (isset($_POST['login'])) {
    	$username= mysqli_real_escape_string($db,$_POST['username']);
    	
    	$password= mysqli_real_escape_string($db, $_POST['password_1']);
    	if(empty($username)) {
    		array_push($errors, "Username is required");

    	}
    	if(empty($password)) {
    		array_push($errors,"Password is required");
        }
        if(count($errors==0)) {
    		$password=md5($password);
    		$query ="SELECT * FROM users WHERE username ='$username' AND password='$password'";
    		$result=mysqli_query($db,$query);
    		
    		if (mysqli_num_rows($result)) {
    			//log user in.
    			 $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
    	    }else {
    	    	array_push($errors, "Wrong username/password combination");
    	    }
    	
        }
    	}






    	//logout
    	if (isset($_GET['l ogout'])){
    		session_destroy();
    		unset($_SESSION['username']);
    		header('location: login.php');
    	}
    }
?>
