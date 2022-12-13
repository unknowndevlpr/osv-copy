<?php

include 'connection.php';
require('./Admin_session.php');

$print = $_GET['print'];
    if($print != ""){
        $sql = "SELECT * FROM vaccine where dateofvaccine = '$print' AND status1 ='Approved' order by lastname asc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();
        $display ="none";
    }else{
        $sql = "SELECT * FROM vaccine where status1 ='Approved' order by dateofvaccine asc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();
        $display_1 ="none";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="asset/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset/table/dataTables.bootstrap4.min.css">
    <script src="asset/bootstrap4/js/bootstrap.bundle.js" async></script>
    <link rel="icon" href="asset/icons/logo_1.PNG" type="image/jpg" size="16x16"/>
    <title>Document</title>
</head>

<body onload="window.print()" class=" mb-4">
        <div class="header_1 px-5">
            <div class="col1">
            <img id="" src="asset/icons/logo_1.PNG" width="150px" height="110px">
                
            </div>
            <h1>List of Schedule</h1>
            <div class="col2">
                <h2 style="display:<?php echo $display_1?>;">Date: <?php echo $row["dateofvaccine"]; ?></h2>
                <h2 style="display:<?php echo $display_1?>;">Time: <?php echo $row["timeofvaccine"]; ?></h2>
                <h2>Location: Payo Plaza</h2>
            </div>
            </div>
        

    <div class=" w-100 p-1 px-5">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="">
            <tr >
                <th >Name</th>
                <th >User ID</th>
                <th style="display:<?php echo $display?>;">Schedule</th>
                <th style="display:<?php echo $display?>;">Time</th>
                <th >Vaccine</th>
                <th >Dosage</th>
            </tr>
        </thead>
        <tbody>
        <?php do{ ?>
                
            <tr>
                <td><?php echo $row["lastname"]; ?>, <?php echo $row["firstname"]; ?> <?php echo $row["middlename"]; ?></td>
                <td><?php echo $row["userid"]; ?></td>
                <td style="display:<?php echo $display?>;"><?php echo $row["dateofvaccine"]; ?></td>
                <td style="display:<?php echo $display?>;"><?php echo $row["timeofvaccine"]; ?></td>
                <td><?php echo $row["typeofvaccine"]; ?></td>
                <td><?php echo $row["dosage"]; ?></td>
            </tr>
            <?php }while ($row = $result->fetch_assoc()) ?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>
    </div>





    
        <button tyype="button" id="print" class="btn btn-primary" onclick="window.print()">Print</button>

        <script src="asset/table/jquery-3.5.1.js"></script>
        <script src="asset/table/jquery.dataTables.min.js"></script>
        <script src="asset/table/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
        </script>
</body>
<style>
    ::-webkit-scrollbar {
  display: none;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  /* color: #565353 */
  font-size: 14px;
  /* font-family: 'Open Sans', sans-serif; */
  /* font-family: Malgun Gothic; */
  text-decoration: none;
}
html{
    background-color: white;
}
body{
    width: 100%;
    min-width: 900px;
    max-width: 1400px;
    margin: auto;
    /* padding: 30px;
    padding-top: 0; */
    
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items:center;

}
.header_1{
    display: flex;
    width: 100%;
    max-width: 1400px;
    justify-content: space-between;
    align-items: center;
    
}
.header_1 .col1, .header_1 .col2{
    width: auto;

}
.header_1 .col1{
    /* border: 1px solid red; */
    display: flex;
    flex-direction: column;
    
    padding-left: 0;
}

.header_1 .col2{
    /* border: 1px solid blue; */
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.header_1 .col1 h2, .header_1 .col2 h2{
    padding: 5px;
    padding-right: 30px;
    align-self: flex-end;
    font-size: 14px;
}
h1{
    font-weight: bold;
    font-size: 24px;
    padding: 10px;
}
button{
    
    position: fixed;
    bottom: 30px;
}

@media print{
	 .dataTables_length ,.pagination, #print {
		visibility: hidden;
	}
   
}

</style>
</html>