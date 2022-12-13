<?php
error_reporting(0);

    include 'connection.php';
    require('./Admin_session.php');
    $id = $_GET['userid'];
    $sql = "SELECT * FROM signup WHERE userid = '$id'";
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();

    $id = $_GET['userid'];
    $sql1 = "SELECT * FROM user_records where userid = '$id' order by id asc";
    $result1 = $conn->query($sql1) or die ($conn->error);
    $row1 = $result1->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Scheduling for Vaccination</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="icon" href="asset/icons/logo_1.PNG" type="image/jpg" size="16x16"/>
	
</head>
<body>
    <div class="navigation" id="navigation">
        <div class="logo">
            <img id="backbtn" src="asset/icons/logo_1.PNG">
        </div>
        <div class="navigation-button">
            <a href="Admin_home.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4136060.PNG">
                    <label>Home</label>
                </div>
            </a>
            <a href="Admin_covid_vaccine.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/vaccine.PNG">
                    <label>Covid Vaccine</label>
                </div>
            </a>
            <a href="Admin_user_information.php" style="background-color: #3083b3;">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/info.PNG">
                    <label>User Information</label>
                </div>
            </a>
            <a href="Admin_schedule_for_vaccination.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4779371.PNG">
                    <label>Schedule for Vaccination</label>
                </div>
            </a>
            <a href="Admin_list_of_schedule.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4836503.PNG">
                    <label>List of Schedule</label>
                    <?php
                        error_reporting(0);
                        $schedule_data = "SELECT status1 FROM vaccine WHERE status1 ='On Process' ";
                        $schedule_data_run = mysqli_query($conn, $schedule_data);

                        if($total = mysqli_num_rows($schedule_data_run))
                        {
                            echo '<h1 id="label">'.$total.'</h1>';
                        }else{
                            echo '<h1 id="label"></h1>';
                        }
                        
                        ?>
                </div>
            </a>
            <a href="Admin_cancel_request.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/cancel.PNG">
                    <label>Cancel Request</label>
                    <?php
                        error_reporting(0);
                        $schedule_data = "SELECT cancelstatus FROM cancel_request WHERE cancelstatus ='to cancel' ";
                        $schedule_data_run = mysqli_query($conn, $schedule_data);

                        if($total = mysqli_num_rows($schedule_data_run))
                        {
                            echo '<h1 id="label">'.$total.'</h1>';
                        }else{
                            echo '<h1 id="label"></h1>';
                        }
                        
                        ?>
                </div>
            </a>
            <a href="Admin_Dosage.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/list.PNG">
                    <label>Dosage</label>
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
        <a href="Admin_home.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4136060.PNG">
                    <label>Home</label>
                </div>
            </a>
            <a href="Admin_covid_vaccine.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/Vaccine.PNG">
                    <label>Covid Vaccine</label>
                </div>
            </a>
            <a href="Admin_user_information.php" style="background-color: #3083b3;">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/info.PNG">
                    <label>User Information</label>
                </div>
            </a>
            <a href="Admin_schedule_for_vaccination.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4779371.PNG">
                    <label>Schedule for Vaccination</label>
                </div>
            </a>
            <a href="Admin_list_of_schedule.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4836503.PNG">
                    <label>List of Schedule</label>
                    <?php
                        error_reporting(0);
                        $schedule_data = "SELECT status1 FROM vaccine WHERE status1 ='On Process' ";
                        $schedule_data_run = mysqli_query($conn, $schedule_data);

                        if($total = mysqli_num_rows($schedule_data_run))
                        {
                            echo '<h1 id="label">'.$total.'</h1>';
                        }else{
                            echo '<h1 id="label"></h1>';
                        }
                        
                        ?>
                </div>
            </a>
            <a href="Admin_cancel_request.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/cancel.PNG">
                    <label>Cancel Request</label>
                    <?php
                        error_reporting(0);
                        $schedule_data = "SELECT cancelstatus FROM cancel_request WHERE cancelstatus ='to cancel' ";
                        $schedule_data_run = mysqli_query($conn, $schedule_data);

                        if($total = mysqli_num_rows($schedule_data_run))
                        {
                            echo '<h1 id="label">'.$total.'</h1>';
                        }else{
                            echo '<h1 id="label"></h1>';
                        }
                        
                        ?>
                </div>
            </a>
            <a href="Admin_dosage.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/list.PNG">
                    <label>Dosage</label>
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
    <div class="container" id="container">
        <div class="header">
            <div class="header_btn" id="header_btn">
                <img id="menu_btn" src="asset/icons/menu.PNG">
            </div>
            <div class="header-session-name" style="margin-left: auto">
                <label><img id="#user_image" src="asset/icons/user.PNG"></label><label>Administrator</label>
            </div>
        </div>
        <div class="page-details">
            <label>User Profile</label>
        </div>
        <div class="details" style="border: 1px solid blak;">
        <div class="personal-info-btn">
            <button type="button" id="back-btn">Back</button>
        </div>
            <div class="personal-info" id="personal-info2">
                <div class="info-container">
                    <div class="info">
                        <label>Last Name :</label>
                        <input type="text" name="" value="<?php echo $row['lastname']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>First Name :</label>
                        <input type="text" value="<?php echo $row['firstname']; ?>" value="" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>Middle Name :</label>
                        <input type="text" name="" value="<?php echo $row['middlename']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Place of Birth :</label>
                        <input type="text" name="" value="<?php echo $row['placeofbirth']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>Birth Date :</label>
                        <input type="text" name="" value="<?php echo $row['dateofbirth']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Age :</label>
                        <input type="text" name="" value="<?php echo $row['age']; ?>" disabled>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Gender :</label>
                        <input type="text" name="" value="<?php echo $row['gender']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Civil Status :</label>
                        <input type="text" name="" value="<?php echo $row['civilstatus']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                    <div class="info">
                        <label>Address :</label>
                        <input type="text" name="" value="<?php echo $row['address1']; ?>" style="text-transform: capitalize;" disabled>
                    </div>
                </div>
                <div class="info-container" id="">
                    <div class="info">
                        <label>Contact Number :</label>
                        <input type="text" name="" value="<?php echo $row['contact']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Email :</label>
                        <input type="text" name="" value="<?php echo $row['email']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>ID :</label>
                        <input type="text" name="" value="<?php echo $row['userid']; ?>" disabled>
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
</body>
<script>
var refresh = document.getElementById("back-btn");
	refresh.onclick =  function(){
        window.location.href = './Admin_user_information.php';
    }
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
		window.location.href = './Admin_sign_out_session.php';
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