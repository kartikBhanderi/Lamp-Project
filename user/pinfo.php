<?php
    session_start();

    $fn =  $_SESSION['First_name'];
    $ln = $_SESSION['Last_name'];
    $dob = $_SESSION['Date_of_birth'];
    $gender = $_SESSION['Gender'];
    $pwd = $_SESSION['Password'];
    $addr = $_SESSION['Address'];
    $bc = $_SESSION['Branch_Code'];
    $accNo = $_SESSION['Acc_no'];
    $aadhar = $_SESSION['Aadhar'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pinfo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .c1
        {
            background-color: rgba(0,0,0,0.1) !important;
            backface-visibility: hidden;
            border-radius: 9px;
            color: white;
            margin-left: 15%;
            margin-top: 60px;
            width: 70%;
            height: 500px;
            padding: 10px;
            box-shadow: 0 8px 20px 0 rgba(255,255,255,0.2);
            text-align: center;
        }
        body
        {
            background-color: green
        }
        .c2
        {
            color: whitesmoke;
            font-size: 60px;
            font-family: cursive;
            text-align: center;
            
        }
        .c3
        {
            height: 1px;
            background-color: white;
        }
        .c4
        {
            font-size: 20px;
            text-align: left;
            margin-left: 100px;
            margin-top: 60px;
            font-weight:350;
            letter-spacing: 0.5px;
        }
        
        
    </style>

</head>
<body>
    <div class="c1">
        <h1 class="c2"> Personal infornation</h1>
        <hr class="c3">
        
        <div class="c4">
            User Name : <?php echo $fn." ".$ln ?> <br><br>
       
            Gender : <?php echo $gender ?><br><br>
        
            DOB : <?php echo $dob ?><br><br>
        
            Address : <?php echo $addr ?><br><br>
        
            Aadhar No : <?php echo $aadhar ?> <br>
        </div>
        
    </div>
</body>
</html>