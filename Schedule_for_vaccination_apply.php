<?php
        
        error_reporting(0);
        require('./session.php');
        include 'connection.php';
        
        // to display data into pop-up form
        $date_of_vaccine = $_GET['date_of_vaccine'];
        $sql_data = "SELECT * FROM schedule WHERE dateofvaccine ='$date_of_vaccine'";
        $result_data = $conn->query($sql_data) or die ($conn->error);
        $row_data = $result_data->fetch_assoc();

        $_SESSION['date'] = $row_data['dateofvaccine'];
        $_SESSION['time'] = $row_data['timeofvaccine'];
        $_SESSION['place'] = $row_data['place'];
        $_SESSION['dosage'] = $row_data['dosage'];

        // to display data into table from database
        $sql1 = "SELECT * FROM schedule order by id desc";
        $result1 = $conn->query($sql1) or die ($conn->error);
        $row1 = $result1->fetch_assoc();

        // save schedule
        $date = $row_data['dateofvaccine'];
        $time = $row_data['timeofvaccine'];
        $place = $row_data['place'];
        $status ="On Process";
        $today = date('Ymd');
        $time = time('H-M-S');
        $today1 = date('Y-m-d');
        $today2 = strtotime($today1);
        $dateschedule1 = $row_data['dateofvaccine'];
        $dateschedule2 = strtotime($dateschedule1);

        // to count the number of request
        $dateofvaccine_1 = $row_data['dateofvaccine'];
        $schedule_data = "SELECT request1 FROM vaccine WHERE request1 ='$dateofvaccine_1'";
        $schedule_data_run = mysqli_query($conn, $schedule_data);
        $total = mysqli_num_rows($schedule_data_run);

        // to COMPLETE user info
        $userid1 = $_SESSION["userid"];
        $getinfo = "SELECT * FROM signup WHERE userid ='$userid1'";
        $data1 = $conn->query($getinfo) or die ($conn->error);
        $row_data1 = $data1->fetch_assoc();
        $address1 = $row_data1['address1'];
        $address2 ="";
        if(isset($_POST['save'])){ 
            if($address1 == $address2){
                // echo "<script>alert('Please Compelete Your Information First!');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['complete_your_information'] = "complete_your_information";
            }else{

            if($dateschedule2 >= $today2){
            if($total == "100"){
                // echo "<script>alert('The Schedule is Full!');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['full'] = "full";
            }else{
                
            $date = $row_data['dateofvaccine'];
            $time = $row_data['timeofvaccine'];
            $place = $row_data['place'];
            $typeofvaccine = $_POST["typeofvaccine"];
            $dosage = $_SESSION['dosage'];
            $userid = $_SESSION["userid"];
            $lastname = $_SESSION["lastname"];
            $firstname = $_SESSION["firstname"];
            $middlename = $_SESSION["middlename"];
            $unique_id = $_POST["unique_id"];
            $current_date = date('Y-m-d');
            $get_status = "SELECT vaccine_status, dosage, firstdose, seconddose, booster, secondbooster FROM signup where userid ='$userid'";
            $status_result = $conn->query($get_status) or die ($conn->error);
            $status_row = $status_result->fetch_assoc();

            $check = $status_row['vaccine_status'];
            $check_dosage = $status_row['dosage'];
            $firstdose = $status_row['firstdose'];
            $seconddose = $status_row['seconddose'];
            $booster = $status_row['booster'];
            $secondbooster = $status_row['secondbooster'];
            $check_status = "On Process";
            $blank_1 ="";
            $request1 = $row_data['dateofvaccine'];

            $get_status1 = "SELECT * FROM list where userid ='$userid'";
            $status_result1 = $conn->query($get_status1) or die ($conn->error);
            $status_row1 = $status_result1->fetch_assoc();
            $seconddose1 = $status_row1['seconddosevaccine'];
            $booster1 = $status_row1['boostervaccine'];

        if($dosage == "First Dose"){
        if($firstdose == $blank_1){        
        if ($check == $check_status){
            // echo "<script>alert('On Process');</script>";
            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
            $_SESSION['on_process'] = "on_process";
        } else{
            $sql = "INSERT INTO vaccine (dateofvaccine, timeofvaccine, dosage, daterequest, typeofvaccine, place, lastname, firstname, middlename, status1, userid, unique_id, request1) VALUES ('$date', '$time', '$dosage', '$current_date', '$typeofvaccine', '$place', '$lastname', '$firstname', '$middlename', '$status', '$userid', '$unique_id', '$request1')";
            $result = mysqli_query($conn, $sql);
            if ($result){
            $vaccine_status ="On Process";
            $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', dosage = '$dosage' WHERE userid = '$userid'";
            $update = mysqli_query($conn, $sql);
            $dosage = $_SESSION['dosage'];
            
            $sql = "UPDATE signup SET firstdose = '$dosage' WHERE userid = '$userid'";
            $update = mysqli_query($conn, $sql);
            
            // echo "<script>alert('Apply successfully');</script>";
            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
            $_SESSION['apply_success'] = "apply_success";
            }else{
                // echo "<script>alert('failed');</script>";
                $_SESSION['failed'] = "failed";
            }
            }
            }else{
                if ($check == $check_status){
                    // echo "<script>alert('On Process');</script>";
                    // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                    $_SESSION['on_process'] = "on_process";
                } else{
                
                // echo "<script>alert('First dose Already Finish');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['first_dose_already_done'] = "first_dose_already_done";
                }
            }
        }else{
            
            if($dosage == "Second Dose"){
                if ($seconddose == $blank_1){
                   
            if($firstdose == $blank_1){
                // echo "<script>alert('Please take your First Dose First!');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['take_first'] = "take_first";
            }else{
                if($seconddose == $blank_1){        
            if ($check == $check_status){
                // echo "<script>alert('On Process');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['on_process'] = "on_process";
            } else{
            $sql = "INSERT INTO vaccine (dateofvaccine, timeofvaccine, dosage, daterequest, typeofvaccine, place, lastname, firstname, middlename, status1, userid, unique_id, request1) VALUES ('$date', '$time', '$dosage', '$current_date', '$typeofvaccine', '$place', '$lastname', '$firstname', '$middlename', '$status', '$userid', '$unique_id', '$request1')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $vaccine_status ="On Process";
                $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', dosage = '$dosage' WHERE userid = '$userid'";
                $update = mysqli_query($conn, $sql);
                $dosage = $_SESSION['dosage'];
                
                $sql = "UPDATE signup SET seconddose = '$dosage' WHERE userid = '$userid'";
                $update = mysqli_query($conn, $sql);
               
                // echo "<script>alert('Apply successfully');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['apply_success'] = "apply_success";
            
            }else{
                    // echo "<script>alert('failed');</script>";
                    $_SESSION['failed'] = "failed";
                }
                }
            }else{
                // echo "<script>alert('Second dose Already Finish');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['second_dose_already_done'] = "second_dose_already_done";
                
            }
            }
            }else{
            if ($check == $check_status){
                // echo "<script>alert('On Process');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['on_process'] = "on_process";
            } else{
            
            // echo "<script>alert('Second dose Already Finish');</script>";
            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
            $_SESSION['second_dose_already_done'] = "second_dose_already_done";

            }
        }
        }else{
            if($dosage == "Booster"){
            if ($booster == $blank_1){
            if($seconddose == $blank_1){
                // echo "<script>alert('Please take your Second Dose First!');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['take_second'] = "take_second";
            }else{
                if($typeofvaccine == $seconddose1){
                    // echo "<script>alert('Please change your selected vaccine!');</script>";
                    // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                    $_SESSION['change_vaccine'] = "change_vaccine";
                }else{

            if($booster == $blank_1){
            if ($check == $check_status){
                // echo "<script>alert('On Process');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['on_process'] = "on_process";
            } else{
            $sql = "INSERT INTO vaccine (dateofvaccine, timeofvaccine, dosage, daterequest, typeofvaccine, place, lastname, firstname, middlename, status1, userid, unique_id, request1) VALUES ('$date', '$time', '$dosage', '$current_date', '$typeofvaccine', '$place', '$lastname', '$firstname', '$middlename', '$status', '$userid', '$unique_id', '$request1')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $vaccine_status ="On Process";
                $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', dosage = '$dosage' WHERE userid = '$userid'";
                $update = mysqli_query($conn, $sql);
                $dosage = $_SESSION['dosage'];
                
                $sql = "UPDATE signup SET booster = '$dosage' WHERE userid = '$userid'";
                $update = mysqli_query($conn, $sql);
               
                // echo "<script>alert('Apply successfully');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['apply_success'] = "apply_success";
                }else{
                    // echo "<script>alert('failed');</script>";
                    $_SESSION['failed'] = "failed";
                }
            }
            }else{
            // echo "<script>alert('Booster Already Finish');</script>";
            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
            $_SESSION['booster_already_finish'] = "booster_already_finish";
                }
            }
        }
            }else{
            if ($check == $check_status){
                // echo "<script>alert('On Process');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['on_process'] = "on_process";
                } else{
                
                // echo "<script>alert('Booster dose Already Finish');</script>";
                // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                $_SESSION['booster_already_finish'] = "booster_already_finish";
                }
            }
                }else{
                    if($dosage == "Second Booster"){
                        if ($check == $check_status){
                            // echo "<script>alert('On Process');</script>";
                            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                            $_SESSION['on_process'] = "on_process";
                            }else{
                                if($secondbooster == "Second Booster"){
                                    // echo "<script>alert('Your Second booster is Finish!');</script>";
                                    // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                                    $_SESSION['your_second_booster_is_finish'] = "your_second_booster_is_finish";
                                }else{
                                if($booster == $blank_1){
                                    // echo "<script>alert('Please Take your booster first!');</script>";
                                    // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                                    $_SESSION['take_booster'] = "take_booster";
                                }else{
                                    if($typeofvaccine == $seconddose1){
                                        // echo "<script>alert('Please change your selected vaccine!');</script>";
                                        // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                                        $_SESSION['change_vaccine'] = "change_vaccine";
                                    }else{
                                        if($typeofvaccine == $booster1){
                                            // echo "<script>alert('Please change your selected vaccine!');</script>";
                                            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                                            $_SESSION['change_vaccine'] = "change_vaccine";
                                        }else{
                                    $sql = "INSERT INTO vaccine (dateofvaccine, timeofvaccine, dosage, daterequest, typeofvaccine, place, lastname, firstname, middlename, status1, userid, unique_id, request1) VALUES ('$date', '$time', '$dosage', '$current_date', '$typeofvaccine', '$place', '$lastname', '$firstname', '$middlename', '$status', '$userid', '$unique_id', '$request1')";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result){
                                        $vaccine_status ="On Process";
                                        $sql = "UPDATE signup SET vaccine_status = '$vaccine_status', dosage = '$dosage' WHERE userid = '$userid'";
                                        $update = mysqli_query($conn, $sql);
                                        $dosage = $_SESSION['dosage'];
                                        
                                        $sql = "UPDATE signup SET secondbooster = '$dosage' WHERE userid = '$userid'";
                                        $update = mysqli_query($conn, $sql);
                                       
                                        // echo "<script>alert('Apply successfully');</script>";
                                        // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                                        $_SESSION['apply_success'] = "apply_success";
                                    }else{
                                        // echo "<script>alert('failed');</script>";
                                        $_SESSION['failed'] = "failed";

                                    }
                                }
                                }
                            }
                            }
                            }
                    }else{
                        
                            // echo "<script>alert('Second Booster dose Already Finish');</script>";
                            // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
                            
                    }
                }
            }
        
        }
        
    }
}
 else{
    // echo "<script>alert('The Schedule is unavailable!');</script>";
    // echo "<script>window.location.href = './Schedule_for_vaccination.php'</script>";
    $_SESSION['unavailable'] = "unavailable";
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
            <a href="Schedule_for_vaccination.php" style="background-color: #3083b3;">
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
            <a href="Sign-out.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/2010497.PNG">
                    <label>Sign out</label>
                </div>
            </a>
        </div>
    </div>
    <!-- add schedule form -->
    <div class="pop_up_background" id="pop_up_background">
    <form method="POST" action="" class="personal-info" id="personal-info" autocomplete="off">
    
                <div class="edit">
                    <label>Apply Schedule</label>
                </div>
                <div class="info-container">
                    <input type="hidden" name="unique_id" value="<?php echo $today; ?><?php echo $time; ?><?php echo $_SESSION['userid']; ?>">
                    <div class="info">
                        <label>Date :</label>
                        <input type="text" name="date" value="<?php echo $_SESSION['date']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>Time :</label>
                        <input type="text" name="time" value="<?php echo $_SESSION['time']; ?>" disabled>
                    </div>
                    
                </div>
                <div class="info-container">
                    <div class="info" id="info2">
                        <label>Place :</label>
                        <input type="text" name="place" value="<?php echo $_SESSION['place']; ?>" disabled>
                    </div>
                    
                    
                </div>
                <div class="info-container">
                    <div class="info" id="">
                        <label>Dosage :</label>
                        <input type="text" name="dosage" value="<?php echo $_SESSION['dosage']; ?>" disabled>
                    </div>
                    <div class="info">
                        <?php
                            include 'connection.php';
                            $date_of_vaccine = $_GET['date_of_vaccine'];
						    $sql3 = "SELECT * FROM vaccinetype WHERE date1 = '$date_of_vaccine'";
                            $result3 = $conn->query($sql3) or die ($conn->error);
                            $row3 = $result3->fetch_assoc();
                            
						?>
                        <label>Vaccine :</label>
                        <select type="text" name="typeofvaccine" required >
                            <option value=""></option>
                            <?php do{ ?>
							<option value="<?php echo $row3['typeofvaccine']; ?>"><?php echo $row3['typeofvaccine']; ?></option>
							<?php }while ($row3 = $result3->fetch_assoc()) ?>
                        </select>
                    </div>
                </div>
                <div class="personal-info-btn">
                    <button type="submit" name="save" id="update">Save</button>
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
            <label>Schedule for Vaccination</label>
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
                $schedule_data = "SELECT * FROM schedule";
                $schedule_data_run = mysqli_query($conn, $schedule_data);

                if($total = mysqli_num_rows($schedule_data_run))
                {
                    echo '<label id="label">Result : '.$total.'</label>';
                }else{
                    echo '<label id="label">Result : 0</label>';
                }
            } else{
                $search = $_GET['search'];
                $schedule_data = "SELECT * FROM schedule where dateofvaccine LIKE '$search' || timeofvaccine LIKE '$search' || place LIKE '%$search%'";
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
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Schedule</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Time</label>
                </div>
                <div class="table-header-row" id="">
                    <label>Type of Vaccine</label>   
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Dosage</label>
                </div>
                <div class="table-header-row">
                    <label>Place</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Request</label>
                </div> 
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Action</label>
                </div>
            </div>
            <?php do{ ?>
                <div id="a">
                    <div class="table-column">
                        <div class="table-column-row" id="table-header-row-resize">
                            <label style="cursor: default"><?php echo $row1["dateofvaccine"]; ?></label>
                        </div>
                        <div class="table-column-row" id="table-header-row-resize">
                            <label style="cursor: default"><?php echo $row1["timeofvaccine"]; ?></label>
                        </div>
                        <div class="table-column-row" id="">
                            <label style="cursor: default">
                                <?php echo $_SESSION["typeofvaccine"];?>                        
                            </label>
                        </div>
                        <div class="table-column-row" id="table-header-row-resize">
                            <label style="cursor: default"><?php echo $row1["dosage"]; ?></label>
                        </div>
                        <div class="table-column-row">
                            <label style="cursor: default"><?php echo $row1["place"]; ?></label>
                        </div>
                        <div class="table-column-row" id="table-header-row-resize">
                        <?php
                            error_reporting(0);

                            $search = $_GET['search'];
                            $blank = "";
                            
                            $date = $row1['dateofvaccine'];

                            $schedule_data = "SELECT request1 FROM vaccine WHERE request1 ='$date'";
                            $schedule_data_run = mysqli_query($conn, $schedule_data);

                            if($total = mysqli_num_rows($schedule_data_run))
                            {
                                echo '<label id="label">'.$total.' / 100</label>';
                            }else{
                                echo '<label id="label">0 / 100</label>';
                            }

                        ?>  
                        </div>
                        <div class="table-column-row" id="table-header-row-resize">
                            <a href="#id=<?php echo $row1['id'];?>" id="apply"><label>Apply</label></a> 
                        </div>
                    </div>
                </div>
            <?php }while ($row1 = $result1->fetch_assoc()) ?>
            </div>
        </div>

        </div>
        </div>
    </div>
   
    <?php
        if(isset($_SESSION['complete_your_information']) == "complete_your_information"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Please Compelete Your Information First!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['complete_your_information']);
        }
    ?>
    <?php
        if(isset($_SESSION['full']) == "full"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'The Schedule is Full!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['full']);
        }
    ?>
     <?php
        if(isset($_SESSION['on_process']) == "on_process"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'On Process',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['on_process']);
        }
    ?>
      <?php
        if(isset($_SESSION['apply_success']) == "apply_success"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Apply successfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['apply_success']);
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
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['failed']);
        }
    ?>
     <?php
        if(isset($_SESSION['first_dose_already_done']) == "first_dose_already_done"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'First dose already done',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
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
                title: 'Second dose already done',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['second_dose_already_done']);
        }
    ?>
     <?php
        if(isset($_SESSION['take_first']) == "take_first"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Take First dose first!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['take_first']);
        }
    ?>
     <?php
        if(isset($_SESSION['take_second']) == "take_second"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Take Second dose first!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['take_second']);
        }
    ?>
     <?php
        if(isset($_SESSION['take_booster']) == "take_booster"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Please Take your booster first!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['take_booster']);
        }
    ?>
    <?php
        if(isset($_SESSION['change_vaccine']) == "change_vaccine"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Please change your selected vaccine!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['change_vaccine']);
        }
    ?>
    <?php
        if(isset($_SESSION['booster_already_finish']) == "booster_already_finish"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Booster Already Finish',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['booster_already_finish']);
        }
    ?>
    <?php
        if(isset($_SESSION['your_second_booster_is_finish']) == "your_second_booster_is_finish"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Your second booster is finish',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['your_second_booster_is_finish']);
        }
    ?>
    <?php
        if(isset($_SESSION['unavailable']) == "unavailable"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'The Schedule is unavailable!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['unavailable']);
        }
    ?>
    <script src="asset/aos.js"></script>
    <script src="asset/fontawesome-all.js"></script>
</body>
<style>
#pop_up_background{
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
    width: 1000px;
   
}
}


</style>

<script>

    var refresh = document.getElementById("refresh-btn");
    var cancel = document.getElementById("cancel");
	refresh.onclick =  function(){
        window.location.href = './Schedule_for_vaccination.php';
    }
    cancel.onclick =  function(){
        window.location.href = './Schedule_for_vaccination.php';
    }
    
    
</script>
</html>