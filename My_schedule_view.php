<?php

    error_reporting(0);
    require('./session.php');
    include 'connection.php';
    $id = $_SESSION['userid'];
    
    $sql = "SELECT * FROM vaccine WHERE userid ='$id' order by id desc";
    $result1 = $conn->query($sql) or die ($conn->error);
    $row = $result1->fetch_assoc();

    // to display data into pop-up form
    $user_id = $_GET['id'];
    $sql_data = "SELECT * FROM vaccine WHERE unique_id ='$user_id'";
    $result_data = $conn->query($sql_data) or die ($conn->error);
    $row_data = $result_data->fetch_assoc();
    
    $_SESSION['date'] = $row_data['dateofvaccine'];
    $_SESSION['time'] = $row_data['timeofvaccine'];
    $_SESSION['place'] = $row_data['place'];
    $_SESSION['lastname'] = $row_data['lastname'];
    $_SESSION['firstname'] = $row_data['firstname'];
    $_SESSION['middlename'] = $row_data['middlename'];
    $_SESSION['userid'] = $row_data['userid'];
    $_SESSION['dosage'] = $row_data['dosage'];
    $_SESSION['status1'] = $row_data['status1'];
    $_SESSION['typeofvaccine'] = $row_data['typeofvaccine'];
    $_SESSION['daterequest'] = $row_data['daterequest'];

    $lastname = $row_data['lastname'];
    $firstname = $row_data['firstname'];
    $middlename = $row_data['middlename'];
    $userid = $row_data['userid'];
    $daterequest = $row_data['daterequest'];
    $dateofvaccine = $row_data['dateofvaccine'];
    $timeofvaccine = $row_data['timeofvaccine'];
    $place = $row_data['place'];
    $typeofvaccine = $row_data['typeofvaccine'];
    $dosage = $row_data['dosage'];
    $cancelstatus = "to cancel";
    $reason = $_POST['reason'];
    // $status1 = $row_data['status1'];
    $datecancel = date('Y-m-d');
    $datecancel1 = strtotime($datecancel);
    $daterequest1 = strtotime($daterequest);
    $unique_id = $_GET['id'];

    $sql = "SELECT firstdose, seconddose, booster, secondbooster FROM list Where userid ='$userid'";
    $result = $conn->query($sql) or die ($conn->error);
    $row2 = $result->fetch_assoc();
    $firstdose = $row2['firstdose'];
    $seconddose = $row2['seconddose'];
    $booster = $row2['booster'];
    $secondbooster = $row2['secondbooster'];

    $sql_data = "SELECT unique_id, status3 FROM vaccine WHERE unique_id ='$user_id'";
    $result_data = $conn->query($sql_data) or die ($conn->error);
    $row_data2 = $result_data->fetch_assoc();
    $status3 = $row_data2['status3'];

    if(isset($_POST['save'])){
        if($status3 == "to cancel"){
            // echo "<script>alert('Your Request is On Process')</script>";
            $_SESSION['on_process_request'] = "on_process_request";
            echo "<script>window.location.href = './My_schedule.php'</script>";
        }else{
           
        if($status3 == "Cancelled"){
            // echo "<script>alert('Cancel Already')</script>";
            $_SESSION['cancel_already'] = "cancel_already";
            echo "<script>window.location.href = './My_schedule.php'</script>";
        }else{
        if($dosage == "First Dose"){
            if($firstdose == ""){
                if($daterequest1 >= $datecancel1){
                    $sql = "INSERT INTO cancel_request (lastname, firstname, middlename, userid, daterequest, dateofvaccine, timeofvaccine, place, typeofvaccine, dosage, datecancel, unique_id, cancelstatus, reason) VALUES ('$lastname', '$firstname', '$middlename', '$userid', '$daterequest', '$dateofvaccine', '$timeofvaccine', '$place', '$typeofvaccine', '$dosage', '$datecancel', '$unique_id', '$cancelstatus', '$reason')";
                    $result = mysqli_query($conn, $sql);

                    $sql_2 = "UPDATE vaccine SET status3 = 'to cancel' WHERE unique_id = '$user_id'";
                    $update_2 = mysqli_query($conn, $sql_2);
                if($result){
                    // echo "<script>alert('Cancel sent to admin successfully')</script>";
                    $_SESSION['cancel_sent'] = "cancel_sent";
                    echo "<script>window.location.href = './My_schedule.php'</script>";
                }else{
                    // echo "<script>alert('failed')</script>";
                    $_SESSION['failed'] = "failed";
                    echo "<script>window.location.href = './My_schedule.php'</script>";
                }
                }else{
                    // echo "<script>alert('Schedule already done!')</script>";
                    $_SESSION['schedule_already_done'] = "schedule_already_done";
                    echo "<script>window.location.href = './My_schedule.php'</script>";
                }
            }else{
                // echo "<script>alert('Your First Dose Already Finish!')</script>";
                $_SESSION['first_dose_already_done'] = "first_dose_already_done";
                echo "<script>window.location.href = './My_schedule.php'</script>";
            }
        }
            else{
                if($dosage == "Second Dose"){
                    if($seconddose == ""){
                        if($daterequest1 >= $datecancel1){
                            $sql = "INSERT INTO cancel_request (lastname, firstname, middlename, userid, daterequest, dateofvaccine, timeofvaccine, place, typeofvaccine, dosage, datecancel, unique_id, cancelstatus, reason) VALUES ('$lastname', '$firstname', '$middlename', '$userid', '$daterequest', '$dateofvaccine', '$timeofvaccine', '$place', '$typeofvaccine', '$dosage', '$datecancel', '$unique_id', '$cancelstatus', '$reason')";
                            $result = mysqli_query($conn, $sql);

                            $sql_2 = "UPDATE vaccine SET status3 = 'to cancel' WHERE unique_id = '$user_id'";
                            $update_2 = mysqli_query($conn, $sql_2);
                        if($result){
                            // echo "<script>alert('Cancel sent to admin successfully')</script>";
                            $_SESSION['cancel_sent'] = "cancel_sent";
                            echo "<script>window.location.href = './My_schedule.php'</script>";
                        }else{
                            // echo "<script>alert('failed')</script>";
                            $_SESSION['failed'] = "failed";
                            echo "<script>window.location.href = './My_schedule.php'</script>";
                        }
                        }else{
                            // echo "<script>alert('Schedule already done!')</script>";
                            $_SESSION['schedule_already_done'] = "schedule_already_done";
                            echo "<script>window.location.href = './My_schedule.php'</script>";
                        }
                    }else{
                        // echo "<script>alert('Your Second Dose Already Finish!')</script>";
                        $_SESSION['second_dose_already_done'] = "second_dose_already_done";
                        echo "<script>window.location.href = './My_schedule.php'</script>";
                    }
                }else{
                    if($dosage == "Booster"){
                        if($booster == ""){
                            if($daterequest1 >= $datecancel1){
                                $sql = "INSERT INTO cancel_request (lastname, firstname, middlename, userid, daterequest, dateofvaccine, timeofvaccine, place, typeofvaccine, dosage, datecancel, unique_id, cancelstatus, reason) VALUES ('$lastname', '$firstname', '$middlename', '$userid', '$daterequest', '$dateofvaccine', '$timeofvaccine', '$place', '$typeofvaccine', '$dosage', '$datecancel', '$unique_id', '$cancelstatus', '$reason')";
                                $result = mysqli_query($conn, $sql);

                                $sql_2 = "UPDATE vaccine SET status3 = 'to cancel' WHERE unique_id = '$user_id'";
                                $update_2 = mysqli_query($conn, $sql_2);
                            if($result){
                                // echo "<script>alert('Cancel sent to admin successfully')</script>";
                                $_SESSION['cancel_sent'] = "cancel_sent";
                                echo "<script>window.location.href = './My_schedule.php'</script>";
                            }else{
                                // echo "<script>alert('failed')</script>";
                                $_SESSION['failed'] = "failed";
                                echo "<script>window.location.href = './My_schedule.php'</script>";
                            }
                            }else{
                                // echo "<script>alert('Schedule already done!')</script>";
                                $_SESSION['schedule_already_done'] = "schedule_already_done";
                                echo "<script>window.location.href = './My_schedule.php'</script>";
                            }
                        }else{
                            // echo "<script>alert('Your Booster Already Finish!')</script>";
                            $_SESSION['booster_already_done'] = "booster_already_done";
                            echo "<script>window.location.href = './My_schedule.php'</script>";
                        }
                    }else{
                        if($dosage == "Second Booster"){
                            if($secondbooster == ""){
                                if($daterequest1 >= $datecancel1){
                                    $sql = "INSERT INTO cancel_request (lastname, firstname, middlename, userid, daterequest, dateofvaccine, timeofvaccine, place, typeofvaccine, dosage, datecancel, unique_id, cancelstatus, reason) VALUES ('$lastname', '$firstname', '$middlename', '$userid', '$daterequest', '$dateofvaccine', '$timeofvaccine', '$place', '$typeofvaccine', '$dosage', '$datecancel', '$unique_id', '$cancelstatus', '$reason')";
                                    $result = mysqli_query($conn, $sql);

                                    $sql_2 = "UPDATE vaccine SET status3 = 'to cancel' WHERE unique_id = '$user_id'";
                                    $update_2 = mysqli_query($conn, $sql_2);
                                if($result){
                                    // echo "<script>alert('Cancel sent to admin successfully')</script>";
                                    $_SESSION['cancel_sent'] = "cancel_sent";
                                    echo "<script>window.location.href = './My_schedule.php'</script>";
                                }else{
                                    // echo "<script>alert('failed')</script>";
                                    $_SESSION['failed'] = "failed";
                                    echo "<script>window.location.href = './My_schedule.php'</script>";
                                }
                                }else{
                                    // echo "<script>alert('Schedule already done!')</script>";
                                    $_SESSION['schedule_already_done'] = "schedule_already_done";
                                    echo "<script>window.location.href = './My_schedule.php'</script>";
                                }
                            }else{
                                // echo "<script>alert('Your Second Booster Already Finish!')</script>";
                                $_SESSION['second_booster_already_done'] = "second_booster_already_done";
                                echo "<script>window.location.href = './My_schedule.php'</script>";
                            }
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
    <!-- user schedule form -->
    <div class="pop_up_background" id="pop_up_background">
    <form method="POST" action="" class="personal-info" id="personal-info" autocomplete="off">
    
                <div class="edit">
                    <label>Cancel request?</label>
                </div>
                <div class="info-container">
                
                    <div class="info">
                        <label>Name :</label>
                        <input type="text" name="date" value="<?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['middlename']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>User ID :</label>
                        <input type="text" name="time" value="<?php echo $_SESSION['userid']; ?>" disabled>
                    </div>
                    
                </div>
                <div class="info-container">
                
                    <div class="info">
                        <label>Date Apply :</label>
                        <input type="text" name="date" value="<?php echo $_SESSION['daterequest']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Schedule and Time :</label>
                        <input type="text" name="date$time" value="<?php echo $_SESSION['date']; ?> | <?php echo $_SESSION['time']; ?>" disabled>
                    </div>
                    
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Place :</label>
                        <input type="text" name="place" value="<?php echo $_SESSION['place']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Type of Vaccine :</label>
                        <input type="text" name="place" value="<?php echo $_SESSION['typeofvaccine']; ?>" disabled>
                    </div>
                </div>
                <div class="info-container" id="info-container">
                    <div class="info">
                        <label>Dosage :</label>
                        <input type="text" name="dosage" value="<?php echo $_SESSION['dosage']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Status :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['status1']; ?>" disabled>
                    </div>
                </div>
                <div class="info-container" id="info-container">
                    <div class="info" style="width: 88%; margin-top: 5px;">
                        <label>Reason :</label>
                        <textarea name="reason" id="reason" required></textarea>
                    </div>
                </div>
                <div class="personal-info-btn">
                    <button type="submit" name="save" id="update">Ok</button>
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
                $schedule_data = "SELECT * FROM vaccine where fullname LIKE '%$search%' || userid LIKE '%$search%' || typeofvaccine LIKE '$search' || dateofvaccine LIKE '%$search%' || timeofvaccine LIKE '%$search%' || place LIKE '%$search%' || status1 LIKE '$search'";
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
                            <a href="#userid=<?php echo $row['userid'];?>" id="cancel_schedule"><label>Cancel</label></a> 
                        </div>
                </div>
            </div>
            <?php }while ($row = $result1->fetch_assoc()) ?>
            </div>
        </div>

        </div>
        </div>
    </div>

    
    
    <script src="asset/aos.js"></script>
    <script src="asset/fontawesome-all.js"></script>
</body>
<style>
#personal-info, #pop_up_background{
    display: block;
}
#navigation, #container{
    pointer-events: none;
    user-select: none;

}
#personal-info{
    width: 610px;
}
@media screen and (max-width: 720px){
    #personal-info{
    width: 98%;
}
.container .details .table{
    width: 1100px;
   
}
}



</style>
<script>

    // var refresh = document.getElementById("refresh-btn");
    var cancel = document.getElementById("cancel");
	// refresh.onclick =  function(){
    //     window.location.href = './My_schedule_view.php';
    // }
    cancel.onclick =  function(){
        window.location.href = './My_schedule.php';
    }

</script>
</html>