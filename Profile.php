<?php
error_reporting(0);
require('./session.php');
include 'connection.php';

// TO UPDATE USER'S INFORMATION
if (isset($_POST["update"])){
    
    $id = $_SESSION['userid'];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $dateofbirth = $_POST["dateofbirth"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $civilstatus = $_POST["civilstatus"];
    $placeofbirth = $_POST["placeofbirth"];
    
        $sql = "UPDATE signup SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', dateofbirth = '$dateofbirth', age = '$age', gender = '$gender', address1 = '$address', contact = '$contact', placeofbirth = '$placeofbirth', civilstatus = '$civilstatus' WHERE userid = '$id'";
        $update = mysqli_query($conn, $sql);
        if($update){
            $sql1 = "UPDATE vaccine SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', middlename = '$middlename' WHERE userid = '$id'";
            $update1 = mysqli_query($conn, $sql1);

            // echo "<script>alert('Update successfully');</script>";
            $_SESSION['update'] = "update";

            $id = $_SESSION['userid'];
            $sql = "SELECT * FROM signup WHERE userid = '$id'";
              
            $result = $conn->query($sql) or die ($conn->error);
            $row = $result->fetch_assoc();
            $_SESSION["lastname"] = $row['lastname'];
            $_SESSION["firstname"] = $row['firstname'];
            $_SESSION["middlename"] = $row['middlename'];
           
            $_SESSION["id"] = $row['id'];
            $_SESSION["gender"] = $row['gender'];
            $_SESSION["contact"] = $row['contact'];
            $_SESSION["dateofbirth"] = $row['dateofbirth'];
            $_SESSION["civilstatus"] = $row['civilstatus'];
            $_SESSION["placeofbirth"] = $row['placeofbirth'];
            $_SESSION["address"] = $row['address1'];
            $_SESSION["age"] = $row['age'];
            // echo "<script>window.location.href = './Profile.php'</script>";
        }else{
            // echo "<script>alert('Failed');</script>";
            $_SESSION['failed'] = "failed";
        }
    }
    $id = $_SESSION['userid'];
    $sql1 = "SELECT * FROM user_records where userid = '$id' order by id asc";
    $result1 = $conn->query($sql1) or die ($conn->error);
    $row1 = $result1->fetch_assoc();
   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Scheduling for Vaccination</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
    <link rel="stylesheet" href="asset/css/fontawesome-all.css" />
    <script src="asset/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="asset/css/aos.css">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="icon" href="asset/icons/logo_1.PNG" type="image/jpg" size="16x16"/>
	
</head>
<body>
    <div class="navigation" id="navigation">
        <div class="logo">
            <img id="backbtn" src="asset/icons/logo_1.PNG">
        </div>
        <div class="navigation-button">
            <a href="Home.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4136060.PNG">
                    <label>Home</label>
                </div>
            </a>
            <a href="Covid_vaccine.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/vaccine.PNG">
                    <label>Covid Vaccine</label>
                </div>
            </a>
            <a href="Profile.php" style="background-color: #3083b3;">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/1011813.PNG">
                    <label>Profile</label>
                </div>
            </a>
            <a href="Schedule_for_vaccination.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4779371.PNG">
                    <label>Schedule for Vaccination</label>
                </div>
            </a>
            <a href="Notification.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/1667987334212.PNG" class=".notif_icon">
                    <label>Notification</label>
                </div>
            </a>
            <a href="My_schedule.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/sched.PNG">
                    <label>My Schedule</label>
                </div>
            </a>
            <a href="List_of_schedule.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4836503.PNG">
                    <label>List of Schedule</label>
                </div>
            </a>
            <a id="sign-out">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/2010497.PNG">
                    <label>Sign out</label>
                </div>
            </a>
        </div>
    </div>
    <div class="mobile_view" id="mobile_view"> 
        <div class="navigation" id="navigation">
        <div class="hide_btn" id="hide_btn">
            <img id="close_btn" src="asset/icons/close.PNG">
        </div>
        <div class="logo">
            <img id="backbtn" src="asset/icons/logo_1.PNG">
        </div>
        <div class="navigation-button" id="navigation-button">
            <a href="Home.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4136060.PNG">
                    <label>Home</label>
                </div>
            </a>
            <a href="Covid_vaccine.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/vaccine.PNG">
                    <label>Covid Vaccine</label>
                </div>
            </a>
            <a href="Profile.php" style="background-color: #3083b3;">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/1011813.PNG">
                    <label>Profile</label>
                </div>
            </a>
            <a href="Schedule_for_vaccination.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4779371.PNG">
                    <label>Schedule for Vaccination</label>
                </div>
            </a>
            <a href="Notification.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/1667987334212.PNG" class=".notif_icon">
                    <label>Notification</label>
                </div>
            </a>
            <a href="My_schedule.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/sched.PNG">
                    <label>My Schedule</label>
                </div>
            </a>
            <a href="List_of_schedule.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4836503.PNG">
                    <label>List of Schedule</label>
                </div>
            </a>
            <a class="sign-out" id="sign-out1">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/2010497.PNG">
                    <label>Sign out</label>
                </div>
            </a>
        </div>
        </div>
    </div>
    <!-- sign-out -->
    <div class="sign_out_form" id="sign_out_form">
        <div class="sign_out_div">
            <div class="sign_out_div_msg">
                <label>Are you sure you want to Sign out?</label>
            </div>
            <div class="sign_out_div_btn">
                <button type="button" id="okay" value="">Sign out</button>
                <button type="button" id="cancel_sign_out" value="">Cancel</button>
            </div>
        </div>
    </div>
    <!-- edit personal info -->
    <div class="pop_up_background" id="pop_up_background">
    <form method="POST" action="" class="personal-info" id="personal-info" autocomplete="off">
    <script src="generateage.js"></script>
    <script>
        function lettersonly(input){
            var regex = /[^a-zA-Z .]/gi;
            
            input.value = input.value.replace(regex,"");
        }
        </script>
                <div class="edit">
                    <label>Edit</label>
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Last Name :</label>
                        <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" onkeyup="lettersonly(this)" style="text-transform: capitalize;" required>
                    </div>
                    <div class="info">
                        <label>First Name :</label>
                        <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" onkeyup="lettersonly(this)" style="text-transform: capitalize;" required >
                    </div>
                    <div class="info">
                        <label>Middle Name :</label>
                        <input type="text" name="middlename" value="<?php echo $_SESSION['middlename']; ?>" onkeyup="lettersonly(this)" style="text-transform: capitalize;" required>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Place of Birth :</label>
                        <input type="text" name="placeofbirth" value="<?php echo $_SESSION['placeofbirth']; ?>" style="text-transform: capitalize;" required>
                    </div>
                    <div class="info">
                        <label>Birth Date :</label>
                        <input type="date" name="dateofbirth" id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" value="<?php echo $_SESSION['dateofbirth']; ?>" >
                    </div>
                    <div class="info">
                        <label>Age :</label>
                        <input type="hidden" name="age" id="txtage1"  value="<?php echo $_SESSION['age']; ?>">
                        <input type="text" name="" id="txtage"  value="<?php echo $_SESSION['age']; ?>" disabled>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info">
                       
                        <label>Gender :</label>
                        <select type="text" name="gender" required>
                            <option value="<?php echo $_SESSION['gender']; ?>"><?php echo $_SESSION['gender']; ?></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
                    </div>
                    <div class="info">
                        <label>Civil Status :</label>
                        <select type="text" name="civilstatus" required>
                            <option value="<?php echo $_SESSION['civilstatus']; ?>"><?php echo $_SESSION['civilstatus']; ?></option>
							<option value="Married">Married</option>
							<option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
						</select>
                    </div>
                    <div class="info">
                        <label>Address :</label>
                        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" style="text-transform: capitalize;" required>
                    </div>
                </div>
                <div class="info-container" id="info-container">
                    <div class="info" id="info" style="margin-left: ;">
                        <label>Contact Number :</label>
                        <input type="number" name="contact" id="input" value="<?php echo $_SESSION['contact']; ?>" 
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                         type="number" maxlength="11" required >
                    </div>
                    
                </div>
                <div class="personal-info-btn">
                    <button type="submit" name="update" id="update">Save</button>
                    <button type="button" name="cancel" id="cancel">Cancel</button>
                </div>
        </form>
    </div>
    <div class="container" id="container">
        <div class="header">
            <div class="header_btn" id="header_btn">
                <img id="menu_btn" src="asset/icons/menu.PNG">
            </div>
            <div class="notif">
                <a href="Notification.php">
                    <button class="notif_btn">
                    <?php
                        $userid = $_SESSION['userid'];
                            $msg_box_sql = "SELECT * FROM msg_box WHERE userid ='$userid' AND notif =''";
                            $msg_box_sql_result = mysqli_query($conn, $msg_box_sql);
            
                            if($total = mysqli_num_rows($msg_box_sql_result))
                            {
                                $num = $total;
                            }else{
                            $no_result = "none";
                        }
                    ?>
                        <span style="display: <?php echo $no_result?>;"><?php echo $num?></span>
                    <i class="fa-solid fa-bell fa-xl"></i>
                    </button>
                </a>
            </div>
            <div class="header-session-name">
                <label><img id="#user_image" src="asset/icons/user.PNG"></label><label><?php echo $_SESSION["lastname"]; ?>, <?php echo $_SESSION["firstname"]; ?> <?php echo $_SESSION["middlename"]; ?></label>
                </div>
            </div>
        <div class="page-details">
            <label>Profile</label>
        </div>
        <div class="details" style="border: 1px solid blak;">
            <div class="personal-info-btn">
            <button type="button" id="edit">Edit</button>
            </div>
            <div class="personal-info" id="personal-info2">
                <div class="info-container">
                    <div class="info">
                        <label>Last Name :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['lastname']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>First Name :</label>
                        <input type="text" value="<?php echo $_SESSION['firstname']; ?>" value="" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>Middle Name :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['middlename']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Place of Birth :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['placeofbirth']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>Birth Date :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['dateofbirth']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Age :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['age']; ?>" disabled>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Gender :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['gender']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Civil Status :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['civilstatus']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Address :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['address']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                </div>
                <div class="info-container" id="">
                    <div class="info">
                        <label>Contact Number :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['contact']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Email :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['email']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>ID :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['userid']; ?>" disabled>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="details" style="border: 1px solid blak;" id="details2">
            <div class="personal-info-btn">
                <label>Records</label>
            </div>
            <!-- table -->
            <div class="table-data">
                <div class="table">
                    
                    <div class="table-header">
                        <div class="table-header-row" id="">
                            <label>Schedule</label>
                        </div>
                        <div class="table-header-row" id="">
                            <label>Time</label>
                        </div>
                        <div class="table-header-row" id="">
                            <label>Vaccine</label>
                        </div>
                        <div class="table-header-row" id="">
                            <label>Dosage</label>
                        </div>
                        <div class="table-header-row" id="">
                            <label>Status</label>   
                        </div>
                        <div class="table-header-row" id="">
                            <label>Place</label>   
                        </div>
                        
                    </div>
                    <?php do{ ?>
                    <a id="a">
                        <div class="table-column">
                            <div class="table-column-row" id="">
                                <label style="cursor: default"><?php echo $row1["dateofvaccine"]; ?></label>
                            </div>
                            <div class="table-column-row" id="">
                                <label style="cursor: default"><?php echo $row1["timeofvaccine"]; ?></label>
                            </div>
                            <div class="table-column-row" id="">
                                <label style="cursor: default"><?php echo $row1["typeofvaccine"]; ?></label>
                            </div>
                            <div class="table-column-row" id="">
                                <label style="cursor: default"><?php echo $row1["dosage"]; ?></label>
                            </div>
                            <div class="table-column-row" id="">
                                <label style="cursor: default; color: <?php
                                $status_color = $row1['status1'];
                                $status_no1 = "Approved";
                                $status_no2 = "Confirmed";
                                $status_no3 = "On Process";
                                $status_no4 = "Cancel";
                                if($status_color == $status_no1){
                                    $_SESSION['text_color'] ="#1dbf04";
                                }
                                if($status_color == $status_no2){
                                    $_SESSION['text_color'] ="#1671b9";
                                }
                                if($status_color == $status_no3){
                                    $_SESSION['text_color'] ="#b77112";
                                }
                                if($status_color == $status_no4){
                                    $_SESSION['text_color'] ="#a92f0b";
                                }
                                echo $_SESSION['text_color']; ?>;"><?php echo $row1["status1"]; ?></label></label>
                            </div>
                            <div class="table-column-row" id="">
                                <label style="cursor: default"><?php echo $row1["place"]; ?></label>
                            </div>
                        </div>
                    </a>
                    <?php }while ($row1 = $result1->fetch_assoc()) ?>
                    </div>
                </div>
            </div>
             <!--/table -->     
        </div>
    </div>

    <?php
        if(isset($_SESSION['update']) == "update"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Update successfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Profile.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['update']);
        }
    ?>
     <?php
        if(isset($_SESSION['failed']) == "failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Something went wrong!',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['failed']);
        }
    ?>
    <script src="asset/aos.js"></script>
    <script src="asset/fontawesome-all.js"></script>
</body>
<script src="script.js"></script>
<script>
var sign_out_form = document.getElementById("sign_out_form");
var signout = document.getElementById("sign-out");
var cancel_sign_out = document.getElementById("cancel_sign_out");
var okay = document.getElementById("okay");
    signout.onclick =  function(){
		sign_out_form.style="display: block;";
	}
    cancel_sign_out.onclick =  function(){
		sign_out_form.style="display: none;";
	}
    okay.onclick =  function(){
		window.location.href = './Sign-out.php';
	}

    // for mobile nav. to display
    var mobile_view = document.getElementById("mobile_view");
    var close_btn = document.getElementById("close_btn");
    var header_btn = document.getElementById("header_btn");
    var menu = document.getElementById("menu_btn");
    var signout1 = document.getElementById("sign-out1");
    signout1.onclick =  function(){
		sign_out_form.style="display: block;";
	}
    menu.onclick =  function(){
		mobile_view.style="display: block;";
        header_btn.style="display: none;";
	}
    close_btn.onclick =  function(){
		mobile_view.style="display: none;";
        header_btn.style="display: block;";
	}
</script>
</html>