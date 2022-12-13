<?php

    error_reporting(0);
    
    include 'connection.php';
    require('./Admin_session.php');
    $sql = "SELECT * FROM list order by id desc";
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();

    // to display data into pop-up form
    

    $user_id = $_GET['id'];
    $sql_data = "SELECT * FROM list WHERE unique_id ='$user_id'";
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
    $_SESSION['typeofvaccine'] = $row_data['typeofvaccine'];

    $firstdose = $row_data['firstdose'];
    $seconddose = $row_data['seconddose'];
    $booster = $row_data['booster'];
    $secondbooster = $row_data['secondbooster'];

    $firstdosevaccine = $row_data['firstdosevaccine'];
    $seconddosevaccine = $row_data['seconddosevaccine'];
    $boostervaccine = $row_data['boostervaccine'];
    $secondboostervaccine = $row_data['secondboostervaccine'];

    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $middlename = $_SESSION['middlename'];
    $typeofvaccine = $_POST['typeofvaccine'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $place = $_POST ['place'];
    $dosage = $_POST['dosage'];
    $status1 = "Confirmed";
    $userid = $_SESSION['userid'];

    
    $sql_data1 = "SELECT * FROM cancel_request WHERE unique_id ='$user_id'";
    $result_data1 = $conn->query($sql_data1) or die ($conn->error);
    $row_data1 = $result_data1->fetch_assoc();
    $cancelstatus2 = $row_data1['cancelstatus'];
    if(isset($_POST['save'])){
        if($userid == ""){
            // echo "<script>alert('Unable to process!');</script>";
            // echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
            $_SESSION['unable_to_process'] = "unable_to_process";
        }else{
           
            if($cancelstatus2 == "to cancel"){
                // echo "<script>alert('to cancel!');</script>";
                // echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
                $_SESSION['to_cancel'] = "to_cancel";
            }else{
        if($dosage == "First Dose"){
            if($firstdose == "First Dose"){
                // echo "<script>alert('First Dose Already Done');</script>";
                // echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
                $_SESSION['first_dose_already_done'] = "first_dose_already_done";
            }else{
                 // start
                $sql = "INSERT INTO user_records (lastname, firstname, middlename, status1, userid, typeofvaccine, timeofvaccine, dateofvaccine, place, dosage) VALUES ('$lastname', '$firstname', '$middlename', '$status1', '$userid', '$typeofvaccine', '$time', '$date', '$place', '$dosage')";
                $result = mysqli_query($conn, $sql);
                if($result){
                        $sql = "UPDATE list SET firstdose = '$dosage', firstdosevaccine = '$typeofvaccine' WHERE unique_id = '$user_id'";
                        $update = mysqli_query($conn, $sql);

                        $sql = "UPDATE signup SET firstdose = '$dosage' WHERE userid = '$userid'";
                        $update = mysqli_query($conn, $sql);

                    // echo "<script>alert('Save successfully');</script>";
                    $_SESSION['save_dosage_successfully'] = "save_dosage_successfully"; 
                    echo "<script>window.location.href = './Admin_Dosage.php'</script>";

                }else{
                    // echo "<script>alert('FAILED! to save First Dose');</script>";
                    $_SESSION['first_failed'] = "first_failed";
                }
                // end
            }
        }else{
            if($dosage == "Second Dose"){
                if($firstdose == ""){
                    // echo "<script>alert('Take the First Dose first!');</script>";
                    // echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
                    $_SESSION['take_first_dose_first'] = "take_first_dose_first";

                }else{
                if($seconddose == "Second Dose"){
                    // echo "<script>alert('Second Dose Already Done');</script>";
                    $_SESSION['second_dose_already_done'] = "second_dose_already_done";
                    // echo "<script>window.location.href = './Admin_Dosage.php'</script>";
                }else{
                     // start
                    $sql = "INSERT INTO user_records (lastname, firstname, middlename, status1, userid, typeofvaccine, timeofvaccine, dateofvaccine, place, dosage) VALUES ('$lastname', '$firstname', '$middlename', '$status1', '$userid', '$typeofvaccine', '$time', '$date', '$place', '$dosage')";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                            $sql = "UPDATE list SET seconddose = '$dosage', seconddosevaccine = '$typeofvaccine' WHERE unique_id = '$user_id'";
                            $update = mysqli_query($conn, $sql);

                            $sql = "UPDATE signup SET seconddose = '$dosage' WHERE userid = '$userid'";
                            $update = mysqli_query($conn, $sql);
                       
                        // echo "<script>alert('Save successfully');</script>";
                        $_SESSION['save_dosage_successfully'] = "save_dosage_successfully"; 
                        echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
                    }else{
                        // echo "<script>alert('FAILED! to save second Dose');</script>";
                        $_SESSION['second_failed'] = "second_failed";
                    }
                    // end
                }
            }
        }else{
                if($dosage == "Booster"){
                    if($seconddose == ""){
                        // echo "<script>alert('Take the Second Dose first!');</script>";
                        // echo "<script>window.location.href = './Admin_Dosage.php'</script>";
                        $_SESSION['take_second_dose_first'] = "take_second_dose_first";
                    }else{
                    if($booster == "Booster"){
                        // echo "<script>alert('Booster Already Done');</script>";
                        // echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
                        $_SESSION['booster_already_done'] = "booster_already_done";
                    }else{
                        if($typeofvaccine == $seconddosevaccine){
                            // echo "<script>alert('Please change your selected vaccine!');</script>";
                            // echo "<script>window.location.href = './Admin_Dosage.php'</script>";
                            $_SESSION['change_selected_vaccine'] = "change_selected_vaccine";
                        }else{
                         // start
                        $sql = "INSERT INTO user_records (lastname, firstname, middlename, status1, userid, typeofvaccine, timeofvaccine, dateofvaccine, place, dosage) VALUES ('$lastname', '$firstname', '$middlename', '$status1', '$userid', '$typeofvaccine', '$time', '$date', '$place', '$dosage')";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                                $sql = "UPDATE list SET booster = '$dosage', boostervaccine = '$typeofvaccine' WHERE unique_id = '$user_id'";
                                $update = mysqli_query($conn, $sql);

                                $sql = "UPDATE signup SET booster = '$dosage' WHERE userid = '$userid'";
                                $update = mysqli_query($conn, $sql);
                           
                            // echo "<script>alert('Save successfully');</script>";
                            $_SESSION['save_dosage_successfully'] = "save_dosage_successfully"; 
                            echo "<script>window.location.href = './Admin_Dosage.php'</script>";
                        }else{
                            // echo "<script>alert('FAILED! to save Booster');</script>";
                            $_SESSION['booster_failed'] = "booster_failed"; 
                        }
                        // end
                    }
                    }
                }
            }else{
                    if($dosage == "Second Booster"){
                        if($booster == ""){
                            // echo "<script>alert('Take the Booster Dose first!');</script>";
                            // echo "<script>window.location.href = './Admin_Dosage.php'</script>"; 
                            $_SESSION['take_booster_first'] = "take_booster_first";
                        }else{
                        if($secondbooster == "Second Booster"){
                            // echo "<script>alert('Second Booster Already Done');</script>";
                            // echo "<script>window.location.href = './Admin_Dosage.php'</script>";
                            $_SESSION['second_booster_already_done'] = "second_booster_already_done";
                            
                        }else{
                            if($typeofvaccine == $boostervaccine){
                                // echo "<script>alert('Please change your selected vaccine!');</script>";
                                // echo "<script>window.location.href = './Admin_Dosage.php'</script>";
                                $_SESSION['change_selected_vaccine'] = "change_selected_vaccine";
                            }else{
                             // start

                            $sql = "INSERT INTO user_records (lastname, firstname, middlename, status1, userid, typeofvaccine, timeofvaccine, dateofvaccine, place, dosage) VALUES ('$lastname', '$firstname', '$middlename', '$status1', '$userid', '$typeofvaccine', '$time', '$date', '$place', '$dosage')";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                    $sql = "UPDATE list SET secondbooster = '$dosage', secondboostervaccine = '$typeofvaccine' WHERE unique_id = '$user_id'";
                                    $update = mysqli_query($conn, $sql);

                                    $sql = "UPDATE signup SET secondbooster = '$dosage' WHERE userid = '$userid'";
                                    $update = mysqli_query($conn, $sql);
                               
                                // echo "<script>alert('Save successfully');</script>";
                                $_SESSION['save_dosage_successfully'] = "save_dosage_successfully"; 
                                echo "<script>window.location.href = './Admin_Dosage.php'</script>";

                            }else{
                                // echo "<script>alert('FAILED! to save Second Booster');</script>";
                                $_SESSION['second_booster_failed'] = "second_booster_failed";
                            }
                            // end
                        }
                        }
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
            <a href="Admin_Dosage.php" style="background-color: #3083b3;">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/list.PNG">
                    <label>Dosage</label>
                </div>
            </a>
            <a href="Admin_sign-out.php">
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
                    <label>Update</label>
                </div>
                <div class="info-container">
                
                    <div class="info">
                        <label>Name :</label>
                        <input type="text" name="" value="<?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['middlename']; ?>" disabled>
                    </div>
                    <div class="info">
                        <label>User ID :</label>
                        <input type="text" name="userid" value="<?php echo $_SESSION['userid']; ?>" disabled>
                    </div>
                    
                </div>
                <div class="info-container">
                
                    <div class="info">
                        <label>Date :</label>
                        <input type="date" name="date" required>
                    </div>
                    <div class="info">
                        <label>Time :</label>
                        <select type="text" name="time" id="input" required>
                            <option value=""></option>
                            <option value="7:00 am - 5:00 pm">7:00 am - 5:00 pm</option>
                            <option value="8:00 am - 5:00 pm">8:00 am - 5:00 pm</option>
                        </select>
                    </div>
                    
                </div>
                <div class="info-container">
                    <div class="info">
                        <label>Place :</label>
                        <input type="text" name="place" value="Payo Plaza">
                    </div>
                    <div class="info">
                        <label>Type of Vaccine :</label>
                        <select type="text" name="typeofvaccine" id="input" required >
                            <option value="<?php echo $_SESSION['typeofvaccine']; ?>"><?php echo $_SESSION['typeofvaccine']; ?></option>
                            <option value="Pficer">Pficer</option>
                            <option value="Johnson">Johnson</option>
                            <option value="Moderna">Moderna</option>
                            <option value="Astrazeneca">Astrazeneca</option>
                        </select>
                    </div>
                </div>
                <div class="info-container" id="info-container">
                    <div class="info" id="info">
                        <label>Dosage :</label>
                        <select type="text" name="dosage" id="input" required >
                            <option value=""></option>
                            <option value="First Dose">First Dose</option>
                            <option value="Second Dose">Second Dose</option>
                            <option value="Booster">Booster</option>
                            <option value="Second Booster">Second Booster</option>
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
            <div class="header-session-name" style="margin-left: auto">
                <label><img id="#user_image" src="asset/icons/user.PNG"></label><label>Administrator</label>
            </div>
        </div>
        <div class="page-details">
            <label>Dosage</label>
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
                $schedule_data = "SELECT * FROM list";
                $schedule_data_run = mysqli_query($conn, $schedule_data);

                if($total = mysqli_num_rows($schedule_data_run))
                {
                    echo '<label id="label">Result : '.$total.'</label>';
                }else{
                    echo '<label id="label">Result : 0</label>';
                }
            } else{
                $search = $_GET['search'];
                $schedule_data = "SELECT * FROM list where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%'";
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
                    <label>User ID</label>
                </div>
                <div class="table-header-row" id="">
                    <label>Name</label>   
                </div>
                
                <div class="table-header-row" id="table-header-row-resize">
                    <label>First Dose</label>   
                </div><div class="table-header-row" id="table-header-row-resize">
                    <label>Second Dose</label>   
                </div><div class="table-header-row" id="table-header-row-resize">
                    <label>Booster</label>   
                </div><div class="table-header-row" id="table-header-row-resize">
                    <label>Second Booster</label>   
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Action</label>   
                </div>
            </div>
            <?php do{ ?>
                <div id="a">
                <div class="table-column">
                    
                    <div class="table-column-row" id="table-header-row-resize-1">
                        <label style="cursor: default"><?php echo $row["userid"]; ?></label>
                    </div>
                    <div class="table-column-row" id="">
                        <label style="cursor: default"><?php echo $row["lastname"]; ?>, <?php echo $row["firstname"]; ?> <?php echo $row["middlename"]; ?></label>
                    </div>
                    
                    
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["firstdosevaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["seconddosevaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["boostervaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["secondboostervaccine"]; ?></label>
                    </div>
                    
                    <div class="table-column-row" id="table-header-row-resize">
                            <a href="Admin_Dosage.php?id=<?php echo $row['userid'];?>" id="apply"><label>View</label></a> 
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
        if(isset($_SESSION['unable_to_process']) == "unable_to_process"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Unable to process',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['unable_to_process']);
        }
    ?>
    <?php
        if(isset($_SESSION['to_cancel']) == "to_cancel"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'To cancel',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['to_cancel']);
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
                    window.location.href = './Admin_Dosage.php';
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
                    window.location.href = './Admin_Dosage.php';
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
                title: 'Booster already done',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
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
                title: 'Second booster already done',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['second_booster_already_done']);
        }
    ?>
    <?php
        if(isset($_SESSION['save_successfully']) == "save_successfully"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Save successfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['save_successfully']);
        }
    ?>
    <?php
        if(isset($_SESSION['first_failed']) == "first_failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'FAILED! to save First Dose',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['first_failed']);
        }
    ?>
    <?php
        if(isset($_SESSION['second_failed']) == "second_failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'FAILED! to save Second dose',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['second_failed']);
        }
    ?>
    <?php
        if(isset($_SESSION['booster_failed']) == "booster_failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'FAILED! to save Booster',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['booster_failed']);
        }
    ?>
    <?php
        if(isset($_SESSION['second_booster_failed']) == "second_booster_failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'FAILED! to save Second Booster',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['second_booster_failed']);
        }
    ?>
    <?php
        if(isset($_SESSION['take_first_dose_first']) == "take_first_dose_first"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Take first dose first',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['take_first_dose_first']);
        }
    ?>
    <?php
        if(isset($_SESSION['take_second_dose_first']) == "take_second_dose_first"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Take second dose first',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['take_second_dose_first']);
        }
    ?>
     <?php
        if(isset($_SESSION['take_booster_first']) == "take_booster_first"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Take Booster first',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['take_booster_first']);
        }
    ?>
    <?php
        if(isset($_SESSION['change_selected_vaccine']) == "change_selected_vaccine"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Please change your selected vaccine!',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_Dosage.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['change_selected_vaccine']);
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
        window.location.href = './Admin_Dosage.php';
    }
    cancel.onclick =  function(){
        window.location.href = './Admin_Dosage.php';
    }
    

</script>
</html>