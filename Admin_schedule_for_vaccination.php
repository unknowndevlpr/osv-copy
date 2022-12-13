<?php
        error_reporting(0);
        include 'connection.php';
        require('./Admin_session.php');
        // to display data from database
        $sql = "SELECT * FROM schedule order by id desc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();
        
        
        // to display vaccine type
        $date_of_vaccine = $vaccine;
        $sql1 = "SELECT * FROM vaccinetype WHERE date1 = '$date_of_vaccine'";
        $result1 = $conn->query($sql1) or die ($conn->error);
        $row1 = $result1->fetch_assoc();
		
        // to search
        if (isset($_GET["search"])){  

        $search = $_GET['search'];
        $check_record = "SELECT * FROM schedule where dateofvaccine LIKE '$search' || timeofvaccine LIKE '$search' || place LIKE '%$search%' || dosage LIKE '%$search%' order by id desc";
        $sqlvalidate = mysqli_query($conn, $check_record);

        if (mysqli_num_rows($sqlvalidate) == 0){
        // echo "<script>alert('No existing data');</script>";
        $_SESSION['no_existing_data'] = "no_existing_data";
        // echo "<script>window.location.href = './Admin_schedule_for_vaccination.php'</script>";
        }else{
        $search = $_GET['search'];

        $sql = "SELECT * FROM schedule where dateofvaccine LIKE '$search' || timeofvaccine LIKE '$search' || place LIKE '%$search%' || dosage LIKE '%$search%' order by id desc";
                $result = $conn->query($sql) or die ($conn->error);
                $row = $result->fetch_assoc();

            }
        }
    // to save schedule
    if(isset($_POST['save'])){
        
        $date = mysqli_real_escape_string($conn, $_POST["date"]);
        $time = $_POST["time"];
        $place = "Payo Plaza";
        $dosage = $_POST["dosage"];
        $check_date = mysqli_num_rows(mysqli_query($conn, "SELECT dateofvaccine FROM schedule WHERE dateofvaccine='$date'"));
   if ($check_date == 1){
    //    echo "<script>alert('Schedule already set');</script>";
    $_SESSION['schedule_already_set'] = "schedule_already_set";
    //    echo "<script>window.location.href = './Admin_schedule_for_vaccination.php'</script>";
   } else{
       $typeofvaccine = $_POST["typeofvaccine"];
       foreach($typeofvaccine as $vaccinetype){   
       $sql = "INSERT INTO vaccinetype (date1, typeofvaccine) VALUES ('$date', '$vaccinetype')";
       $result = mysqli_query($conn, $sql);
   }
       if ($result){
            $typeofvaccine1 = implode(', ', $_POST["typeofvaccine"]);
           $sql = "INSERT INTO schedule (dateofvaccine, timeofvaccine, place, dosage, typeofvaccine) VALUES ('$date', '$time', '$place', '$dosage', '$typeofvaccine1')";
           $result = mysqli_query($conn, $sql);
        //    echo "<script>alert('Add successfully');</script>";
        $_SESSION['add'] = "add";
           echo "<script>window.location.href = './Admin_schedule_for_vaccination.php'</script>";
       }else{
        //    echo "<script>alert('failed');</script>";
        $_SESSION['failed'] = "failed";
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
            <a href="Admin_schedule_for_vaccination.php" style="background-color: #3083b3;">
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
            <a href="Admin_user_information.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/info.PNG">
                    <label>User Information</label>
                </div>
            </a>
            <a href="Admin_schedule_for_vaccination.php" style="background-color: #3083b3;">
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
    <!-- add schedule form -->
    <div class="pop_up_background" id="pop_up_background">
        <form method="POST" action="" class="personal-info" id="personal-info" autocomplete="off">
            <div class="edit">
                <label>Add Schedule</label>
            </div>
            <div class="info-container">
                <div class="info">
                    <label>Date :</label>
                    <input type="date" name="date" required>
                </div>
                <div class="info">
                    <label>Time :</label>
                    <select type="text" name="time" required >
                        <option value=""></option>
                        <option value="7:00 am - 5:00 pm">7:00 am - 5:00 pm</option>
                        <option value="8:00 am - 5:00 pm">8:00 am - 5:00 pm</option>
                    </select>
                </div> 
            </div>
            <div class="info-container" id="info-containe">
                <div class="info" id="">
                    <label>Place :</label>
                    <input type="text" name="" value="Payo Plaza" disabled>
                </div>  
                <div class="info">
                    <label>Dosage :</label>
                    <select type="text" name="dosage" required >
                        <option value=""></option>
                        <option value="First Dose">First Dose</option>
                        <!-- <option value="Second Dose">Second Dose</option> -->
                        <option value="Booster">Booster</option>
                        <option value="Second Booster">Second Booster</option>
                    </select>
                </div> 
            </div>
            <div class="info-container" id="info-container">
                <div class="info" id="info1" style="">
                    <label>Type of Vaccine :</label>
                    <div class="checkbox">
                        <input type="checkbox" id="input-radio" name="typeofvaccine[]" value="Pficer"><label>Pfizer</label> 
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="input-radio" name="typeofvaccine[]" value="Johnson"><label>Johnson</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="input-radio" name="typeofvaccine[]" value="Moderna"><label>Moderna</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="input-radio" name="typeofvaccine[]" value="Astrazeneca"><label>Astrazeneca</label>
                    </div>
                </div>                  
            </div>
            <div class="personal-info-btn" stye="position: absolute;, display: block;">
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
            <label>Schedule for Vaccination</label>
        </div>
        <div class="details">
        <form method="GET" action="" class="personal-info-btn" id="personal-info-btn-1" autocomplete="off">
            <input type="search" name="search" value="<?php echo $_GET['search']; ?>" required>
            <button type="submit" id="search-btn">Search</button>
            <button type="button" name="refresh-btn" id="refresh-btn">Refresh</button>
            <button type="button" name="add-schedule" id="add-schedule">Add Schedule</button>
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
                $schedule_data = "SELECT * FROM schedule where dateofvaccine LIKE '$search' || timeofvaccine LIKE '$search' || place LIKE '%$search%' || dosage LIKE '%$search%'";
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
        <form method="GET" action="" class="personal-info-btn" id="personal-info-btn2" autocomplete="off">        
            <button type="button" name="add-schedule" id="add-schedule-1">Add Schedule</button>    
        </form>
        <!-- table -->
        <div class="table-data">
        <div class="table">
            
            <div class="table-header">
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Date</label>
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
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Place</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Request</label>
                </div>
            </div>
            <?php do{ ?>
            <a id="a">
                <div class="table-column">
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["dateofvaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["timeofvaccine"]; ?></label>
                    </div>
                    <div class="table-column-row" id=""> 
                    <label style="cursor: default;">
                        <label style="cursor: default;"><?php echo $row["typeofvaccine"];?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["dosage"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <label style="cursor: default"><?php echo $row["place"]; ?></label>
                    </div>
                    <div class="table-column-row" id="table-header-row-resize">
                        <?php
                            error_reporting(0);

                            $search = $_GET['search'];
                            $blank = "";
                            

                            $date = $row['dateofvaccine'];

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
                </div>
            </a>
            <?php } while ($row = $result->fetch_assoc())?>
            </div>
        </div>

        </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['no_existing_data']) == "no_existing_data"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'No existing data',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['no_existing_data']);
        }
    ?>
     <?php
        if(isset($_SESSION['schedule_already_set']) == "schedule_already_set"){
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Schedule already set',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_schedule_for_vaccination.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['schedule_already_set']);
        }
    ?>
         <?php
        if(isset($_SESSION['add']) == "add"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Add successfully',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['add']);
        }
    ?>
     <?php
        if(isset($_SESSION['failed']) == "failed"){
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                
                })
            
                
        </script>
        <?php
            unset($_SESSION['failed']);
        }
    ?>
    <script src="asset/aos.js"></script>
</body>
<style>
#pop_up_background #personal-info{
    width: 610px;
}
@media screen and (max-width: 720px){
    #pop_up_background #personal-info{
    width: 98%;
}
}

</style>

<script>
    var refresh = document.getElementById("refresh-btn");
	refresh.onclick =  function(){
        window.location.href = './Admin_schedule_for_vaccination.php';
    }

    var info = document.getElementById("pop_up_background");
    var info2 = document.getElementById("personal-info2");
    var cancel = document.getElementById("cancel");
    var add = document.getElementById("add-schedule");
    var add1 = document.getElementById("add-schedule-1");
    var navigation = document.getElementById("navigation");
    var container = document.getElementById("container");
	add.onclick =  function(){
		info.style.display ="block";
		navigation.style ="user-select: none";
        navigation.style="pointer-events: none";
        container.style ="user-select: none";
        container.style="pointer-events: none";
	}
    add1.onclick =  function(){
		info.style.display ="block";
		navigation.style ="user-select: none";
        navigation.style="pointer-events: none";
        container.style ="user-select: none";
        container.style="pointer-events: none";
	}
    cancel.onclick =  function(){
		info.style.display ="none";
        navigation.style ="user-select: all";
        navigation.style="pointer-events: all";
        container.style ="user-select: all";
        container.style="pointer-events: all";
		
	}
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