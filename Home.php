<?php
require('./session.php');
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Scheduling for Vaccination</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
    <link rel="stylesheet" href="asset/css/fontawesome-all.css" />
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="icon" href="asset/icons/logo_1.PNG" type="image/jpg" size="16x16"/>
	
</head>
<body>
    <div class="navigation" >
        <div class="logo">
            <img id="backbtn" src="asset/icons/logo_1.PNG">
        </div>
        <div class="navigation-button">
            <a href="Home.php" style="background-color: #3083b3;">
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
            <a href="Profile.php">
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
            <a class="sign-out" id="sign-out">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/2010497.PNG">
                    <label>Sign out</label>
                </div>
            </a>
        </div>
    </div>

    <!-- nav. for mobile view -->
    <div class="mobile_view" id="mobile_view"> 
        <div class="navigation" id="navigation">
        <div class="hide_btn" id="hide_btn">
            <img id="close_btn" src="asset/icons/close.PNG">
        </div>
        <div class="logo">
            <img id="backbtn" src="asset/icons/logo_1.PNG">
        </div>
        <div class="navigation-button" id="navigation-button">
            <a href="Home.php" style="background-color: #3083b3;">
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
            <a href="Profile.php">
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

    <div class="container">
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
            <label>Home</label>
        </div>
        <div class="details">
            <div class="info1" style="margin-top:20px;">
                <label>WHAT ARE CORONAVIRUS?</label>
            </div>
            <div class="info2">
                <p>Coronavirus are a large family of viruses causing a range of illness, 
                    from the common cold to more serious infections such as those caused by 
                    Middle East Respiratory Syndrome- related Coronavirus(MERS-CoV) and Severe 
                    Acute Respiratory Syndrome- related Coronavirus (SARS-Cov). Coronavirus can
                    also cause a variety of diseases in farm animals and domesticated pets.</p>
            </div>
            <div class="info1">
                <label>WHERE DID THE COVID-19 ORIGINATE?</label>
            </div>
            <div class="info2">
                <p>Last 31 December 2019, a clustering of pneumonia cases of unknown etiology in Wuhan,
                     China was reported to the WHO Country Office. The outbreak was later datermned to be caused by a new coronavirus
                         strain that has not been previosly identified in humans.</p>
            </div>
            <div class="info1">
                <label>WHAT ARE THE SYMPTOMS THAT YOU NEED TO WATCH OUT FOR?</label>
            </div>
            <div class="info2">
                <p>Difficulty in breathing, even when sitting, Cough, Fever, and difficulty in breathing,
                    Confusion or sudden change in mental well-being, and Bluish or darkened face or lips if you are experiencing other 
                    severe symptoms, call your BHERT immediately.</p>
            </div>
            <div class="info1">
                <label>WHAT ARE THE WAYS TO MAINTAIN A STRONG PHYSICAL AND MENTAL WELL-BEING?</label>
            </div>
            <div class="info2">
                <p>Eat nutritious food such as fruits, vegetables, fish, and meat</p>
                <p>Exercise inside for 30 minutes per day</p>
                <p>Ensure to have enough sleep</p>
                <p>Practice self-care. Simple relaxing and talking with your loved ones is a form of self-care.</p>
                <p>Talk and check on with your loved ones.</p>
            </div>
        </div>
    </div>
   
</body>
<script src="asset/fontawesome-all.js"></script>
<!-- js for sign-out -->
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
