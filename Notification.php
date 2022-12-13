<?php

    // error_reporting(0);
    require('./session.php');
    include 'connection.php';
    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM msg_box WHERE userid ='$id' order by id desc";
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();
    
    
    if (isset($_POST["mark_btn"])){
        $id_1 = $_POST['id'];
        $read_msg = "Read";
        $sql = "UPDATE msg_box SET notif = '$read_msg' WHERE id = '$id_1'";
        $update = mysqli_query($conn, $sql);
        if($update){
            $_SESSION['mark_as_read'] = "mark_as_read";
        }else{
            $_SESSION['failed'] = "failed";
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
            <a href="Notification.php" style="background-color: #3083b3;">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/1667987334212.PNG" class=".notif_icon">
                    <label>Notification</label>
                </div>
            </a>
            <a href="My_schedule.php" >
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
            <a href="Notification.php" style="background-color: #3083b3;">
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
            <label>Notification</label>
        </div>
        <div class="details">
        <form method="GET" action="" class="personal-info-btn" id="personal-info-btn-1" autocomplete="off">
            
            
            <?php

                error_reporting(0);

                
                $data = "SELECT * FROM msg_box WHERE userid ='$id'";
                $data_run = mysqli_query($conn, $data);

                if($total = mysqli_num_rows($data_run))
                {
                    echo '<label id="label">Result : '.$total.'</label>';
                }else{
                    echo '<label id="label">Result : 0</label>';
                }
           

            ?>
        </form>
        
        <!-- table -->
        <div class="table-data">
        <div class="table">
            
            <div class="table-header">
                
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Date</label>
                </div>
                <div class="table-header-row" id="">
                    <label>info</label>
                </div>
                <div class="table-header-row" id="">
                    <label>Reason of Cancellation</label>
                </div>
                <div class="table-header-row" id="">
                    <label>Message</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Status</label>   
                </div>
                
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Action</label>   
                </div>
            </div>
            <?php do{ ?>
            <div id="a">
                <div class="table-column">
               <?php
                    $msg_sql = "SELECT * FROM msg_box WHERE userid ='$id' order by id desc";
                    $msg_result = $conn->query($msg_sql) or die ($conn->error);
                    $msg_row = $msg_result->fetch_assoc();
                    $msg_read = $row['notif'];
                    $read = "";
                    if($msg_read != $read){
                    $msg_1 = "Read";
                    $font = "normal";
                    }else{
                    $msg_1 = "Unread";
                    $font = "bolder";
                    }
                    
               ?>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default; font-weight: <?php echo $font?>;">
                            <?php echo $row["date_of_msg"]; ?>
                        </label>
                    </div>
                    <div class="table-column-row" id="">
                        <label style="cursor: default; font-weight: <?php echo $font?>;">
                            <?php echo $row["info"]; ?>
                        </label>
                    </div>
                    <div class="table-column-row" id="">
                        <label style="cursor: default; font-weight: <?php echo $font?>;">
                            <?php echo $row["reason"]; ?>
                        </label>
                    </div>
                    <div class="table-column-row" id="">
                        <label style="cursor: default; font-weight: <?php echo $font?>;">
                            <?php echo $row["msg"]; ?>
                        </label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                       
                        <label for="" style="font-weight: <?php echo $font?>;">
                            <?php echo $msg_1 ?>
                        </label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <button type="submit" id="mark_btn" name="mark_btn">Mark as Read</button>
                        </form>
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
     <?php
        if(isset($_SESSION['mark_as_read']) == "mark_as_read"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Mark as read',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Notification.php';
                }
                })
        </script>
        <?php
            unset($_SESSION['mark_as_read']);
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