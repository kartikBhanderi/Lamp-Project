<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="./styles.css">
        <title>
            index.php
        </title>
        <style>
            .c1
            {
                background-color: rgba(0,0,0,0.7) !important;
                backface-visibility: hidden;
                border-radius: 9px;
                color: white;
                margin-left: 33%;
                margin-top: 90px;
                width: 34%;
                height: 50%;
                padding: 15px;
                box-shadow: 0 10px 14px 0 rgba(255,255,255,0.2);
            }
            .c2
            {
                color: whitesmoke;
                font-size: 60px;
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                text-align: center;
                
            }
            .c3
            {
                height: 1px;
                background-color: white;
            }
            
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    </head>

    <body>
        <div class="c2">
            KVB's Bank 
        </div>
        <div class="c1">
            <h2>Sign In As</h2><hr class="c3"><hr>
            <a href="./user/login.php" class="btn btn-success btn-block">Customer</a><br>
            <a href="./employee/login.php" class="btn btn-success btn-block">Employee</a><br>
            <a href="./manager/login.php" class="btn btn-success btn-block">Manager</a><hr><hr class="c3">
            <a href="./user/signup.php" class="btn btn-info btn-block"> Don't have an account ?   signUp </a>
        </div>
    </body>
</html>