<?php

    error_reporting(0);
    
    include 'connection.php';
    require('./Admin_session.php');
    $sql = "SELECT * FROM cancel_request order by id desc";
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();

    // to display data into pop-up form
    $user_id = $_GET['id'];
    $sql_data = "SELECT * FROM vaccine WHERE unique_id ='$user_id'";
    $result_data = $conn->query($sql_data) or die ($conn->error);
    $row_data = $result_data->fetch_assoc();

    $user_id1 = $_GET['id'];
    $sql_data1 = "SELECT * FROM cancel_request WHERE unique_id ='$user_id1'";
    $result_data1 = $conn->query($sql_data1) or die ($conn->error);
    $row_data1 = $result_data1->fetch_assoc();
    $reason = $row_data1['reason'];
    $_SESSION['date'] = $row_data['dateofvaccine'];
    $_SESSION['time'] = $row_data['timeofvaccine'];
    $_SESSION['place'] = $row_data['place'];
    $_SESSION['lastname'] = $row_data['lastname'];
    $_SESSION['firstname'] = $row_data['firstname'];
    $_SESSION['middlename'] = $row_data['middlename'];
    $_SESSION['userid'] = $row_data['userid'];
    $_SESSION['dosage'] = $row_data['dosage'];
    $_SESSION['datecancel'] = $row['datecancel'];
    $_SESSION['cancelstatus'] = $row['cancelstatus'];
    $_SESSION['daterequest'] = $row_data['daterequest'];
    $_SESSION['typeofvaccine'] = $row_data['typeofvaccine'];
    
    $status = $row_data['status1'];
    $userid = $row_data['userid'];
    $user_id = $_GET['id'];
    
    $cancel = "Cancelled";
    if(isset($_POST['save'])){
           
            if($status == "Cancelled"){
                // echo "<script>alert('Cancel already');</script>";
                // echo "<script>window.location.href = './Admin_cancel_request.php'</script>";
                $_SESSION['cancel_already'] = "cancel_already";
            }else{
            $vaccine_status ="";
            $blank_1 ="";
            $dosage_1 = $row_data['dosage'];
            if($dosage_1 == "First Dose"){
                $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', firstdose = '$blank_1' WHERE userid = '$userid'";
                $update = mysqli_query($conn, $sql);
            }else{
                if($dosage_1 == "Second Dose"){
                    $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', seconddose = '$blank_1' WHERE userid = '$userid'";
                    $update = mysqli_query($conn, $sql);
                }else{
                    if($dosage_1 == "Booster"){
                        $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', booster = '$blank_1' WHERE userid = '$userid'";
                        $update = mysqli_query($conn, $sql);
                    }else{
                        if($dosage_1 == "Second Booster"){
                            $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', secondbooster = '$blank_1' WHERE userid = '$userid'";
                            $update = mysqli_query($conn, $sql);
                        }}}}
                        $vaccine_status1 ="Cancelled";
                        $request1 = "";
                        $sql_2 = "UPDATE vaccine SET status1 = '$vaccine_status1', status3 = '$vaccine_status1', request1 = '$request1' WHERE unique_id = '$user_id'";
                        $update_2 = mysqli_query($conn, $sql_2);
                        $cancelstatus = "Cancelled";
                        $sql_3 = "UPDATE cancel_request SET cancelstatus = '$cancelstatus' WHERE unique_id = '$user_id'";
                        $update_3 = mysqli_query($conn, $sql_3);

                        $msg_userid = $_SESSION['userid'];
                        $msg_cancel = "Cancel successfully";
                        $date_of_msg = date('Y-m-d');
                        $info ="Cancel request";
                        $msg_sql = "INSERT INTO msg_box (userid, msg, info, date_of_msg, reason) VALUES ('$msg_userid', '$msg_cancel', '$info', '$date_of_msg', '$reason')";
                        $msg_update = mysqli_query($conn, $msg_sql);
                        // echo "<script>alert('Cancel successfully');</script>";
                        // echo "<script>window.location.href = './Admin_cancel_request.php'</script>";
                        $_SESSION['cancel_successfully'] = "cancel_successfully";
                        
            }
        
    }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Online Scheduling for Vaccination</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
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
            <a href="Admin_user_information.php">
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
            <a href="Admin_cancel_request.php" style="background-color: #3083b3;">
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
                        <label>Date Request :</label>
                        <input type="text" name="date" value="<?php echo $_SESSION['datecancel']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Date Apply :</label>
                        <input type="text" name="date$time" value="<?php echo $_SESSION['daterequest']; ?>" disabled>
                    </div>
                    
                </div>
                <div class="info-container">
                
                    <div class="info">
                        <label>Schedule :</label>
                        <input type="text" name="date" value="<?php echo $_SESSION['date']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Time :</label>
                        <input type="text" name="date$time" value="<?php echo $_SESSION['time']; ?>" disabled>
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
                        <input type="text" name="" value="<?php echo $_SESSION['cancelstatus']; ?>" disabled>
                    </div>
                    
                </div>
                <div class="info-container" id="info-container">
                    <div class="info" style="width: 88%; margin-top: 5px;">
                        <label>Reason :</label>
                        <textarea name="reason" id="reason" disabled><?php echo $row_data1['reason']; ?></textarea>
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
            <div class="header-session-name" style="margin-left: auto">
                <label><img id="#user_image" src="asset/icons/user.PNG"></label><label>Administrator</label>
            </div>
        </div>
        <div class="page-details">
            <label>List of Cancel Request</label>
        </div>
        <div class="details">
        <form method="GET" action="" class="personal-info-btn" id="personal-info-btn-1" autocomplete="off">
            <input type="search" name="search" value="<?php echo $_GET['search']; ?>" required>
            <button type="submit" id="search-btn">Search</button>
            <button type="button" name="refresh-btn" id="refresh-btn">Refresh</button>
            
            <?php
                error_reporting(0);
                $search = $_GET['search'];
                $blank = "";
                 if($search == $blank){
                $schedule_data = "SELECT * FROM vaccine";
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
                    <label>Request</label>
                 </div>
                <div class="table-header-row" id="table-header-row-resize-1">
                    <label>Apply</label>
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
                        <label style="cursor: default"><?php echo $row["datecancel"]; ?></label>
                    </div>
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
                        $status_color = $row['cancelstatus'];
                        $status_no1 = "Approved";
                        $status_no2 = "Cancelled";
                        $status_no3 = "to cancel";
                        
                        if($status_color == $status_no1){
                            $_SESSION['text_color'] ="#1dbf04";
                        }
                        if($status_color == $status_no2){
                            $_SESSION['text_color'] ="#1671b9";
                        }
                        if($status_color == $status_no3){
                            $_SESSION['text_color'] ="#b77112";
                        }
                        
                        echo $_SESSION['text_color']; ?>;"><?php echo $row["cancelstatus"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                            <a href="#userid=<?php echo $row['userid'];?>" id="apply"><label>View</label></a> 
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
        if(isset($_SESSION['cancel_already']) == "cancel_already"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Cancel already',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_cancel_request.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['cancel_already']);
        }
    ?>
     <?php
        if(isset($_SESSION['cancel_successfully']) == "cancel_successfully"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Cancel successfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_cancel_request.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['cancel_successfully']);
        }
    ?>
    <script src="asset/aos.js"></script>

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

    var refresh = document.getElementById("refresh-btn");
    var cancel = document.getElementById("cancel");
	refresh.onclick =  function(){
        window.location.href = './Admin_list_of_schedule.php';
    }
    cancel.onclick =  function(){
        window.location.href = './Admin_cancel_request.php';
    }

</script>
</html>