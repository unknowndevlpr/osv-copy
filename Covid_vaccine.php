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
            <a href="Home.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4136060.PNG">
                    <label>Home</label>
                </div>
            </a>
            <a href="Covid_vaccine.php" style="background-color: #3083b3;">
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
            <a href="Covid_vaccine.php" style="background-color: #3083b3;">
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
            <label>Covid Vaccine</label>
        </div>
        <div class="details">
            <div class="info1" style="margin-top:20px;">
                <label>Pfizer Vaccine</label>
            </div>
            <div class="info2">
                <p>SAFETY- The Pfizer-BioNTech vaccine has been listed for emergency use by
                    the who and is safe and effictive based on data from large-scale clinical trials.</p>
                    
           
                <p>EFFECTIVENESS- Based on data provided by the manufacturer, the Pfizer-BioNTech vaccine,
                     or BNT162B2, has been shown to be 95% effective in an ongoing large-scale clinical trial. A widely used COVID-19 vaccine
                      that's at least 50% effective could help control the pandemic.</p>
           
                <p>SIDE EFFECT- Headache, Joint aches, Muscle aches, Pain at the injection site, tiredness,
                     chills,Fever and Swelling at the injection.</p>
                    
            </div>
            <div class="info1">
                <label>Johnson Vaccine</label>
            </div>
            <div class="info2">
                <p>SAFETY- The Janssen (Johnson & Johnson) vaccine has been listed for emergency use by the WHO and is safe and effective
                     based on data from large-scale clinical trials.</p>
            
                <p>EFFECTIVENESS- Based on information provided by the manufacturer, the Johnson & Johnson vaccine, or AD26.COV2.S, has shown to be 66.9%
                     effictive in an ongoing,
                     large-scale clinical trial.A widely used COVID-19 vaccine that's at least 50% effective could help control the pandemic.</p>
                <p>SIDE EFFECT- Pain or tenderness at the injection site, Redness Swelling and Fever.</p>
                    </div>
            <div class="info1">
                <label>Moderna Vaccine</label>
            </div>
            <div class="info2">
                <p>SAFETY- The Moderna vaccine has been listed for emergency use by the WHO and is safe and effective based
                     on data from large-scale clinical trials.</p>
                <p>EFFECTIVENESS- Based on information provided by the manufacturer, the Moderna vaccine, or mRNA-1273, has shown to be 94.1% effictive
                     in an ongoing, large-scale clinical trial.A widely used COVID-19 vaccine that's at least 50% effective could help control the pandemic.</p>
                <p>SIDE EFFECT- Pain or tenderness at the injection site, Headache, Tiredness, Muscle or joint achres, Chill, Nausea and vommiting, Undararm swelling and Fever.</p>
            </div>
            <div class="info1">
                <label>Astrazeneca Vaccine</label>
            </div>
            <div class="info2">
                <p>SAFETY- The AstrazenecaOxford vaccine has been listed for emergency use by the WHO and is safe and effective based on data 
                    from large-scale clinical trials.</p>
                <p>EFFECTIVENESS- Based on information provided by the manufacturer, the Astrazeneca-Oxford vaccine, or AZDI222, has shown to be 66.9% effictive in an ongoing,
                     large-scale clinical trial.A widely used COVID-19 vaccine that's at least 50% effective could help control the pandemic.</p>
                <p>SIDE EFFECT- Pain or tenderness at the injection site, Headache, Tiredness, Muscle or joint achres, Chill, Nausea and Fever.</p>
            </div>
        </div>
    </div>
    <script src="asset/fontawesome-all.js"></script>
</body>
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