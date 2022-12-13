<?php
    session_start();
    error_reporting(0);
    include 'connection.php';
    // for user
    if($_SESSION['login'] == 'incorrect' || empty($_SESSION['login'])){
        $_SESSION['login'] = 'incorrect';  
    }

    if($_SESSION['login'] == 'correct'){
        
        echo "<script>window.location.href = './Home.php'</script>";
    }
    // for admin
    if($_SESSION['admin_login'] == 'incorrect' || empty($_SESSION['admin_login'])){
        $_SESSION['admin_login'] = 'incorrect';
    }

    if($_SESSION['admin_login'] == 'admin_correct'){
        
        echo "<script>window.location.href = './Admin_home.php'</script>";
    }

    // this is for sign-in
	if (isset($_POST["sign-in"])) {
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["password"]));
	$pass = $_POST["password"];
	$input1 = "admin";
    $input2 = "Admin";
    $input3 = "ADMIN";
    
    if(($email == $input1 || $email == $input2 || $email == $input3) && ($pass == $input1 || $pass == $input2 || $pass == $input3)){
        session_start();
        $_SESSION['admin_login'] = 'admin_correct';
        echo "<script>window.location.href = './Admin_home.php'</script>";
	}else{

	$check_username = "SELECT * FROM signup WHERE email ='$email' AND password='$password'";
	$sqlvalidate = mysqli_query($conn, $check_username);
	$row = mysqli_fetch_array($sqlvalidate);

	if (mysqli_num_rows($sqlvalidate) > 0) {
        session_start();
		$_SESSION['login'] = 'correct';
		$_SESSION["lastname"] = $row['lastname'];
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["middlename"] = $row['middlename'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["dateofbirth"] = $row['dateofbirth'];
        $_SESSION["age"] = $row['age'];
        $_SESSION["gender"] = $row['gender'];
        $_SESSION["placeofbirth"] = $row['placeofbirth'];
        $_SESSION["civilstatus"] = $row['civilstatus'];
        $_SESSION["address"] = $row['address1'];
        $_SESSION["contact"] = $row['contact'];
        $_SESSION["userid"] = $row['userid'];
	
		echo "<script>window.location.href = './Home.php'</script>";
	}
	 else{
	 	$_SESSION["login"] = "incorrect";
         $_SESSION["admin_login"] = "incorrect";
		// echo "<script> alert('login details incorrect'); </script>";
        $_SESSION['login_incorrect'] = "login_incorrect";
	}
    }
}
    // this is for sign-up
    if (isset($_POST["sign-up"])){
      
        $dateofbirth = mysqli_real_escape_string($conn, $_POST["age"]);
        if(($dateofbirth) < 18){
            // echo "<script>alert('Your are not applicable to create an account')</script>";
            $_SESSION['not_able_to_create'] = "not_able_to_create";
        }
        else {
        if(($dateofbirth) >= 18){
            $email = mysqli_real_escape_string($conn, $_POST["sign-up_email"]);
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                // echo "<script>alert('Invalid Email')</script>";
                $_SESSION['invalid_email'] = "invalid_email";
            }
            else{
                
        
            $lastname = mysqli_real_escape_string($conn, $_POST["sign-up_last-name"]);
            $firstname = mysqli_real_escape_string($conn, $_POST["sign-up_first-name"]);
            $middlename = mysqli_real_escape_string($conn, $_POST["sign-up_middle-name"]);
            $dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
            $age = mysqli_real_escape_string($conn, $_POST["age"]);
            $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
            $email = mysqli_real_escape_string($conn, $_POST["sign-up_email"]);
            $password = mysqli_real_escape_string($conn, md5($_POST["sign-up_password"]));
            $cpassword = mysqli_real_escape_string($conn, md5($_POST["sign-up_cpassword"]));
    
            $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM signup WHERE email='$email'"));
            $check_password = mysqli_num_rows(mysqli_query($conn, "SELECT password FROM signup WHERE password='$password'"));
            if ($password !== $cpassword){
            
                // echo "<script>alert('password did not match');</script>";
                $_SESSION['password_not_match'] = "password_not_match";
    
            }elseif ($check_email > 0) {
                    // echo "<script>alert('email already exist');</script>";
                    $_SESSION['email_exist'] = "email_exist";
                    
            } else{
            if($check_password > 0){
                $_SESSION['pass_exist'] = "pass_exist";
            }else{

            
                $sql = "INSERT INTO signup (lastname, firstname, middlename, dateofbirth, age, gender, email, password) VALUES ('$lastname', '$firstname', '$middlename', '$dateofbirth','$age', '$gender', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo "<script>alert('Create Successfully');</script>";
                    $_SESSION['Add_Successfully'] = "Add Successfully";
                    // echo "<script>window.location.href = './login.php'</script>";
                }else{
                    // echo "<script>alert('sign-up failed');</script>";
                    $_SESSION['sign_up_failed'] = "sign_up_failed";
                }
            } 
        }
    }
    
    }
    
    }
    
    }
        

?>
<!DOCTYPE html>
<html>
<head>

	<title>Online Scheduling for Vaccination</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="asset/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="asset/css/aos.css">
    <link rel="stylesheet" type="text/css" href="asset/css/login.css">
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <script scr="asset/css/bootstrap.bundle.min.js" async></script>
	<link rel="icon" href="asset/icons/logo_1.PNG" type="image/jpg" size="16x16"/>
   
</head>
<body>
    
	<div class="loginform">
		<div class="img">
		</div>
	<form method="POST" id="form1" action="" autocomplete="off">
		<div class="logo">
			<img id="menu" src="asset/icons/resbakuna_1.PNG" width="140" height="140">
		</div>
		<div class="box" id="box1">
			<label id="header">Sign In</label>
		</div>
		<div id="box" class="box">
			<label>Email : </label>
		</div>
		<div class="box">
			<input type="text" name="email" value="<?php echo $_POST['email'];?>" required>
		</div>
		<div id="box" class="box">
			<label>Password :</label>
		</div>
		<div class="box">
			<input type="password" id="pass" name="password" value="<?php echo $_POST['password'];?>" required>
			<span><img  id="show" src="asset/icons/7660426.PNG" width="20" height="20"></span>
			<span><img id="hide"  src="asset/icons/7660378.PNG" width="20" height="20"></span>
		</div>
		<div  id="btn" class="box">
			<button type="submit" name="sign-in">Sign In</button>
            <br>
            <button type="button" id="signup" name="signup">Create Account</button>
		</div>
		
	</form>
    <form method="POST" id="form2" action="" autocomplete="off">
    <script src="generateage.js"></script>
    <script>
        function lettersonly(input){
            var regex = /[^a-zA-Z .]/gi;
            
            input.value = input.value.replace(regex,"");
        }
        </script>
        <div class="fill-up">
       
            <div id="fill-up-form">
                <label id="header">Create Account</label>
            </div>
            <div class="fill-up-form">
            <label id="header">Last name :</label>
                <input type="text" name="sign-up_last-name" value="<?php echo $_POST['sign-up_last-name']; ?>" onkeyup="lettersonly(this)" placeholder="" style="text-transform: capitalize;" required>
            </div>
            <div class="fill-up-form">
            <label id="header">First name :</label>
                <input type="text" name="sign-up_first-name" value="<?php echo $_POST['sign-up_first-name']; ?>" onkeyup="lettersonly(this)" placeholder="" style="text-transform: capitalize;" required>
            </div>
            <div class="fill-up-form">
            <label id="header">Middle name :</label>
                <input type="text" name="sign-up_middle-name" value="<?php echo $_POST['sign-up_middle-name']; ?>" onkeyup="lettersonly(this)" placeholder="" style="text-transform: capitalize;" required>
            </div>
            <div class="fill-up-form">
                <label id="header">Date of Birth :</label>
                <input type="date" name="dateofbirth" id="txtbirthdate" value="<?php echo $_POST['dateofbirth']; ?>" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" required>
            </div>
            <div class="fill-up-form">
                <label id="header">Age :</label>
                <input type="hidden" name="age" value="<?php echo $_POST['age']; ?>" id="txtage">
                <input type="text" name="" value="<?php echo $_POST['age']; ?>" id="txtage1" disabled>
                
            </div>
            <div class="fill-up-form">
                <label id="header">Gender :</label>
                <select name="gender" style="text-transform: capitalize;" required>
                    <option value="<?php echo $_POST['gender']; ?>"><?php echo $_POST['gender']; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="fill-up-form">
                <label id="header">Email :</label>
                <input type="text" name="sign-up_email" value="<?php echo $_POST['sign-up_email']; ?>" placeholder="" required>
            </div>
            <div class="fill-up-form">
                <label id="header">Password :</label>
                <input type="password" id="pass1" name="sign-up_password" value="<?php echo $_POST['sign-up_password']; ?>" placeholder="" required>
                <span><img  id="show1" src="asset/icons/7660426.PNG" width="20" height="20"></span>
			    <span><img id="hide1"  src="asset/icons/7660378.PNG" width="20" height="20"></span>
            </div>
            <div class="fill-up-form">
                <label id="header">Confirm Password :</label>
                <input type="password" id="pass2" name="sign-up_cpassword" value="<?php echo $_POST['sign-up_cpassword']; ?>" placeholder="" required>
                <span><img  id="show2" src="asset/icons/7660426.PNG" width="20" height="20"></span>
			    <span><img id="hide2"  src="asset/icons/7660378.PNG" width="20" height="20"></span>
            </div>
            <div  id="btn2" class="box">
                <button type="submit" name="sign-up">Create</button>
                <br>
                <button type="button" id="cancel" name="cancel">Cancel</button>
		    </div>
        </div>
    </form>
	</div>


    <?php
        if(isset($_SESSION['Add_Successfully']) == "Add Successfully"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Add Successfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './login.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['Add_Successfully']);
        }
    ?>
    <?php
        if(isset($_SESSION['sign_up_failed']) == "sign_up_failed"){
        ?>
        <script>
              Swal.fire({
                icon: 'error',
                title: 'Sign up failed!',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['sign_up_failed']);
        }
    ?>
     <?php
        if(isset($_SESSION['not_able_to_create']) == "not_able_to_create"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your are not applicable to create an account',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['not_able_to_create']);
        }
    ?>
     <?php
        if(isset($_SESSION['invalid_email']) == "invalid_email"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Invalid Email',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['invalid_email']);
        }
    ?>
    <?php
        if(isset($_SESSION['email_exist']) == "email_exist"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Email already exist',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['email_exist']);
        }
    ?>
    <?php
        if(isset($_SESSION['pass_exist']) == "pass_exist"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Password already exist',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['pass_exist']);
        }
    ?>
     <?php
        if(isset($_SESSION['password_not_match']) == "password_not_match"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Password did not match',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['password_not_match']);
        }
    ?>
     <?php
        if(isset($_SESSION['login_incorrect']) == "login_incorrect"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Login details incorrect',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['login_incorrect']);
        }
    ?>
    <script src="asset/aos.js"></script>
</body>

<script>
    // for password
	var show = document.getElementById("show");
	var hide = document.getElementById("hide");
	var pass = document.getElementById("pass");
	show.onclick =  function(){
		hide.style.display ="block";
		show.style.display ="none";
		pass.setAttribute('type', 'text');
	}
	hide.onclick =  function(){
		show.style.display ="block";
		hide.style.display ="none";
		pass.setAttribute('type', 'password');
	}
	var show1 = document.getElementById("show1");
	var hide1 = document.getElementById("hide1");
	var pass1 = document.getElementById("pass1");
	show1.onclick =  function(){
		hide1.style.display ="block";
		show1.style.display ="none";
		pass1.setAttribute('type', 'text');
	}
	hide1.onclick =  function(){
		show1.style.display ="block";
		hide1.style.display ="none";
		pass1.setAttribute('type', 'password');
	}
	var show2 = document.getElementById("show2");
	var hide2 = document.getElementById("hide2");
	var pass2 = document.getElementById("pass2");
	show2.onclick =  function(){
		hide2.style.display ="block";
		show2.style.display ="none";
		pass2.setAttribute('type', 'text');
	}
	hide2.onclick =  function(){
		show2.style.display ="block";
		hide2.style.display ="none";
		pass2.setAttribute('type', 'password');
	}
    // for signup
    var form1 = document.getElementById("form1");
    var form2 = document.getElementById("form2");
    var signup = document.getElementById("signup");
    var cancel = document.getElementById("cancel");
    signup.onclick =  function(){
		form2.style.display ="block";
		form1.style.display ="none";
		
	}
	cancel.onclick =  function(){
		form1.style.display ="block";
		form2.style.display ="none";
	}
    
</script>
</html>
<style type="text/css">


</style>