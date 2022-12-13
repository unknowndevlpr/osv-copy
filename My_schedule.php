<?php

    error_reporting(0);
    require('./session.php');
    include 'connection.php';
    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM vaccine WHERE userid ='$id' order by id desc";
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();

     // to search
     if (isset($_GET["search"])){
        $id = $_SESSION['userid'];
        $search = $_GET['search'];
        $check_record = "SELECT * FROM vaccine where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' || typeofvaccine LIKE '$search' || dosage LIKE '%$search%' || dateofvaccine LIKE '%$search%' || timeofvaccine LIKE '$search' || place LIKE '$search' || status1 LIKE '$search' || daterequest LIKE '$search' WHERE userid = '$id' order by id desc";
        $sqlvalidate = mysqli_query($conn, $check_record);

        if (mysqli_num_rows($sqlvalidate) == 0){
        echo "<script>alert('No existing data');</script>";
        echo "<script>window.location.href = './My_schedule.php'</script>";
        }else{
        $search = $_GET['search'];

        $sql = "SELECT * FROM vaccine where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%' || typeofvaccine LIKE '$search' || dosage LIKE '%$search%' || dateofvaccine LIKE '%$search%' || timeofvaccine LIKE '%$search%' || place LIKE '%$search%' || status1 LIKE '%$search%' || daterequest LIKE '$search' WHERE userid = '$id' order by id desc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

            }
        }
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
            <a href="My_schedule.php" style="background-color: #3083b3;">
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
            <a href="My_schedule.php" style="background-color: #3083b3;">
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
            <label>My Schedule</label>
        </div>
        <div class="details">
        <form method="GET" action="" class="personal-info-btn" id="personal-info-btn-1" autocomplete="off">
            
            
            <?php
                error_reporting(0);
                $search = $_GET['search'];
                $blank = "";
                 if($search == $blank){
                $schedule_data = "SELECT * FROM vaccine WHERE userid ='$id'";
                $schedule_data_run = mysqli_query($conn, $schedule_data);

                if($total = mysqli_num_rows($schedule_data_run))
                {
                    echo '<label id="label">Result : '.$total.'</label>';
                }else{
                    echo '<label id="label">Result : 0</label>';
                }
            } else{
                $search = $_GET['search'];
                $schedule_data = "SELECT * FROM vaccine where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%' || typeofvaccine LIKE '$search' || dosage LIKE '%$search%' || dateofvaccine LIKE '%$search%' || timeofvaccine LIKE '%$search%' || place LIKE '%$search%' || status1 LIKE '$search' || daterequest LIKE '$search'";
                $schedule_data_run = mysqli_query($conn, $schedule_data);

                if($total = mysqli_num_rows($schedule_data_run))
                {
                    echo '<label id="label">Result : '.$total.'</label>';
                }else{
                    echo '<label id="label">Result : 0</label>';
                }
            }

            ?>
        </form>
        
        <!-- table -->
        <div class="table-data">
        <div class="table">
            
            <div class="table-header">
                <div class="table-header-row" id="table-header-row-resize-1">
                    <label>Date Apply</label>
                 </div>
                <div class="table-header-row" id="table-header-row-resize-1">
                    <label>Schedule</label>
                 </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Time</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize-2">
                    <label>User ID</label>
                </div>
                <div class="table-header-row" id="">
                    <label>Name</label>   
                </div>
                <div class="table-header-row" id="table-header-row-resize-1">
                    <label>Vaccine</label>   
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Dosage</label>   
                </div>
                <div class="table-header-row" id="table-header-row-resize-1">
                    <label>Place</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize-1">
                    <label>Status</label>   
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Action</label>   
                </div>
            </div>
            <?php do{ ?>
            <div id="a">
                <div class="table-column">
                    <div class="table-column-row" id="table-header-row-resize-1">
                        <label style="cursor: default"><?php echo $row["daterequest"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize-1">
                        <label style="cursor: default"><?php echo $row["dateofvaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["timeofvaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize-2">
                        <label style="cursor: default"><?php echo $row["userid"]; ?></label>
                    </div>
                    <div class="table-column-row" id="">
                        <label style="cursor: default"><?php echo $row["lastname"]; ?>, <?php echo $row["firstname"]; ?> <?php echo $row["middlename"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize-1">
                        <label style="cursor: default"><?php echo $row["typeofvaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["dosage"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize-1">
                        <label style="cursor: default"><?php echo $row["place"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize-1">
                        <label style="cursor: default; color: <?php
                        $status_color = $row['status1'];
                        $status_no1 = "Approved";
                        $status_no2 = "Vaccinated";
                        $status_no3 = "On Process";
                        $status_no4 = "Cancelled";
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
                        
                        echo $_SESSION['text_color']; ?>;"><?php echo $row["status1"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                            <a href="My_schedule_view.php?id=<?php echo $row['unique_id'];?>" id="cancel_schedule"><label>Cancel</label></a> 
                        </div>
                </div>
            </div>
            <?php }while ($row = $result->fetch_assoc()) ?>
            </div>
        </div>

        </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['on_process_request']) == "on_process_request"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your request is on process',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['on_process_request']);
        }
    ?>

    <?php
        if(isset($_SESSION['cancel_already']) == "cancel_already"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Cancel already',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['cancel_already']);
        }
    ?>

     <?php
        if(isset($_SESSION['cancel_sent']) == "cancel_sent"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Cancel sent to admin successfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['cancel_sent']);
        }
    ?>

    <?php
        if(isset($_SESSION['failed']) == "failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Failed',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['failed']);
        }
    ?>

    <?php
        if(isset($_SESSION['schedule_already_done']) == "schedule_already_done"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Schedule already done!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['schedule_already_done']);
        }
    ?>

    <?php
        if(isset($_SESSION['first_dose_already_done']) == "first_dose_already_done"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your First Dose Already Finish!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['first_dose_already_done']);
        }
    ?>

    <?php
        if(isset($_SESSION['second_dose_already_done']) == "second_dose_already_done"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your Second Dose Already Finish!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['second_dose_already_done']);
        }
    ?>

     <?php
        if(isset($_SESSION['booster_already_done']) == "booster_already_done"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your Booster Already Finish!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['booster_already_done']);
        }
    ?>

     <?php
        if(isset($_SESSION['second_booster_already_done']) == "second_booster_already_done"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your Second Booster Already Finish!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './My_schedule.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['second_booster_already_done']);
        }
    ?>
    <script src="asset/aos.js"></script>
    <script src="asset/fontawesome-all.js"></script>
</body>
<style>
    @media screen and (max-width: 720px){
.container .details .table{
    width: 1100px;
   
}
    }
</style>
<script>

    // var refresh = document.getElementById("refresh-btn");
    
	// refresh.onclick =  function(){
    //     window.location.href = './My_schedule.php';
    // }
    // sign-out
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