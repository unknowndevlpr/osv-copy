<?php

    error_reporting(0);
   
    include 'connection.php';
    require('./Admin_session.php');
    $sql = "SELECT * FROM vaccine order by id desc";
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();

     // to search
     if (isset($_GET["search"])){  

        $search = $_GET['search'];
        $check_record = "SELECT * FROM vaccine where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' || typeofvaccine LIKE '$search' || dosage LIKE '%$search%' || dateofvaccine LIKE '%$search%' || timeofvaccine LIKE '$search' || place LIKE '$search' || status1 LIKE '$search' || daterequest LIKE '$search' order by id desc";
        $sqlvalidate = mysqli_query($conn, $check_record);

        if (mysqli_num_rows($sqlvalidate) == 0){
        // echo "<script>alert('No existing data');</script>";
        // echo "<script>window.location.href = './Admin_list_of_schedule.php'</script>";
        $_SESSION['no_existing_data'] = "no_existing_data";
        }else{
        $search = $_GET['search'];

        $sql = "SELECT * FROM vaccine where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%' || typeofvaccine LIKE '$search' || dosage LIKE '%$search%' || dateofvaccine LIKE '%$search%' || timeofvaccine LIKE '%$search%' || place LIKE '%$search%' || status1 LIKE '%$search%' || daterequest LIKE '$search' order by id desc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

            }
        }
        $search1 = $_GET['search'];
        
        $print_sesssion = $search1;
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
    <div class="navigation" >
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
            <a href="Admin_list_of_schedule.php" style="background-color: #3083b3;">
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
            <a href="Admin_schedule_for_vaccination.php">
                <div class="btn">
                    <img id="backbtn" src="asset/icons/4779371.PNG">
                    <label>Schedule for Vaccination</label>
                </div>
            </a>
            <a href="Admin_list_of_schedule.php" style="background-color: #3083b3;">
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
            <label>List of Schedule</label>
        </div>
        <div class="details">
        <form method="GET" action="" class="personal-info-btn" id="personal-info-btn-1" autocomplete="off">
            <input type="search" name="search" value="<?php echo $_GET['search']; ?>" required>
            <button type="submit" id="search-btn">Search</button>
            <button type="button" name="refresh-btn" id="refresh-btn">Refresh</button>
            <a href="Admin_list_of_schedule_print.php?print=<?php echo $print_sesssion;?>" class="print_btn" target="_blank"><button type="button">Print</button></a>
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
        <a href="Admin_list_of_schedule_print.php?print=<?php echo $print_sesssion;?>" class="print_btn1" target="_blank"><button type="button">Print</button></a>
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
                            <a href="Admin_list_of_schedule_view.php?id=<?php echo $row['unique_id'];?>" id="apply"><label>View</label></a> 
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
        if(isset($_SESSION['no_existing_data']) == "no_existing_data"){
        ?>
        <script>
           
            Swal.fire({
                icon: 'warning',
                title: 'No existing data',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_list_of_schedule.php';
                }
                })
                
        </script>
        <?php
            unset($_SESSION['no_existing_data']);
        }
    ?>
    <?php
        if(isset($_SESSION['approved_successfully']) == "approved_successfully"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Approved sucessfully',
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Admin_list_of_schedule.php';
                }
                })
            
                
        </script>
        <?php
            unset($_SESSION['approved_successfully']);
        }
    ?>
    <script src="asset/aos.js"></script>
</body>
<style>
    @media screen and (max-width: 720px){
.container .details .table{
    width: 1100px;
   
}
    }
</style>
<script>

    var refresh = document.getElementById("refresh-btn");
    
	refresh.onclick =  function(){
        window.location.href = './Admin_list_of_schedule.php';
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