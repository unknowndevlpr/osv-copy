<?php
        error_reporting(0);
        include 'connection.php';
        require('./Admin_session.php');
        $sql = "SELECT * FROM signup order by lastname asc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

        if (isset($_GET["search"])){  

        $search = $_GET['search'];
        $check_record = "SELECT * FROM signup where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' ||  gender LIKE '$search' ||  address1 LIKE '%$search%' order by lastname asc";
        $sqlvalidate = mysqli_query($conn, $check_record);

        if (mysqli_num_rows($sqlvalidate) == 0){
        // echo "<script>alert('No existing data');</script>";
        // echo "<script>window.location.href = './Admin_registration.php'</script>";
        $_SESSION['no_existing_data'] = "no_existing_data";
        }else{
        $search = $_GET['search'];

        $sql = "SELECT * FROM signup where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' ||  gender LIKE '$search' ||  address1 LIKE '%$search%' order by lastname";
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
            <label>User Information</label>
        </div>
        <div class="details">
        <form method="GET" action="" class="personal-info-btn" autocomplete="off">
            <input type="search" name="search" value="<?php echo $_GET['search']; ?>" required>
            <button type="submit" id="search-btn">Search</button>
            <button type="button" name="refresh-btn" id="refresh-btn">Refresh</button>
            <?php
                error_reporting(0);
                $search = $_GET['search'];
                $blank = "";
                 if($search == $blank){
                $signup_data = "SELECT * FROM signup";
                $signup_data_run = mysqli_query($conn, $signup_data);

                if($total = mysqli_num_rows($signup_data_run))
                {
                    echo '<label id="label">Result : '.$total.'</label>';
                }else{
                    echo '<label id="label">Result : 0</label>';
                }
            } else{
                $search = $_GET['search'];
                $signup_data = "SELECT * FROM signup where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' ||  gender LIKE '$search' ||  address1 LIKE '%$search%'";
                $signup_data_run = mysqli_query($conn, $signup_data);

                if($total = mysqli_num_rows($signup_data_run))
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
                    <label>User ID</label>
                </div>
                <div class="table-header-row">
                    <label>Name</label>
                </div>
                <div class="table-header-row" id="table-header-row-resize">
                    <label>Gender</label>   
                </div>
                <div class="table-header-row">
                    <label>Address</label>
                </div>
            </div>
            <?php do{ ?>
            <a href="Admin_user_profile.php?userid=<?php echo $row['userid'];?>" id="a">
                <div class="table-column" >
                    <div class="table-column-row" id="table-column-row-resize">
                        <label><?php echo $row['userid']; ?></label>
                    </div>
                    <div class="table-column-row">
                        <label><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
                    </div>
                    <div class="table-column-row" id="table-column-row-resize">
                        <label><?php echo $row['gender']; ?></label>
                    </div>
                    <div class="table-column-row">
                        <label><?php echo $row['address1']; ?></label>
                    </div>
                </div>
            </a>
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
                    window.location.href = './Admin_user_information.php';
                }
                })
                
        </script>
        <?php
            unset($_SESSION['no_existing_data']);
        }
    ?>
    <script src="asset/aos.js"></script>
</body>
<script>
var refresh = document.getElementById("refresh-btn");
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