<?php
    session_start();
    if(!isset($_SESSION['Acc_no']))
    {
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <title> Info_user </title>

        <style>
             .c1
            {
                background-color: rgba(0,0,0,0.7) !important;
                backface-visibility: hidden;
                border-radius: 9px;
                color: white;
                margin-left: 32%;
                margin-top: 7%;
                width: 36%;
                height: 45%;
                padding: 15px;
                text-align: center;
            }
            body
            {
                background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg") ;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover;   
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
        </style>
    </head>
    <body>
        <div class="c2">
            Available Services
        </div>

        <div class="c1">
            <form action="" method="post">
                <a href = "./pinfo.php" class="btn btn-outline-info btn-block">Personal Information</a><hr class="c3">
                <a href = "./ainfo.php" class="btn btn-outline-info btn-block">Account Information</a><hr class="c3">
                <a href = "./changePwd.php" class="btn btn-outline-info btn-block">Change Password</a><hr class="c3">
                <a href = "./updateInfo.php"  class="btn btn-outline-info btn-block"> Update Personal Information </a><hr class="c3">
                
                <button type="submit" name="submit" class="btn btn-outline-danger btn-block"> Log Out</button>
            </form>
        </div>

        <?php

            if(isset($_POST['submit']))
            {
                session_destroy();
                echo "<script > location.href = '../index.php' </script> ";
            }
        ?>
    </body>
</html>