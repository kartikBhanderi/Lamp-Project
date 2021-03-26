<?php
    session_start();
    include('../includes/connection.php');
    
    $accNo = $_SESSION['Acc_no'];
    $pwd = $_SESSION['Password'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>change password </title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../styles.css">
        <style>
            .c1
            {
                background-color: rgba(0,0,0,0.7) !important;
                backface-visibility: hidden;
                border-radius: 9px;
                color: white;
                margin-left: 40%;
                margin-top: 150px;
                width: 20%;
                /* height: 280px; */
                padding: 15px;
                box-shadow: 0 8px 8px 0 rgba(255,255,255,0.2);
                text-align: center;
                letter-spacing: 0.5px;
            }
            input
            {
                border-radius: 5px;
            }
            .c2
            {
                color: whitesmoke;
                font-size: 10px;
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
        
        <div class="c1">
            <h3> Change Password</h3>
            <hr class="c3">
            <form action="" method="POST">
                <br>
                <label for="pwd">New Password </label>
                <input type="password" id="pwd" name="pwd">

                <br><br>
                <hr class="c3">
                <button type="submit" name="submit" class="btn btn-success"> Confirm </button>
            </form>
            
        </div>

        <?php
            if(isset($_POST['submit']))
            {
                $newPwd = $_POST['pwd'];

                if(empty($newPwd) || strlen($newPwd) < 4)
                {
                    echo "<script> alert('Length of password should be atleast 4'); </script>";
                }
                else
                {
                    $query = "UPDATE customer SET Password = '$newPwd' WHERE Acc_no = '$accNo'";
    
                    $result = mysqli_query($con,$query);
    
                    if($result)
                    {
                        echo "<script> alert('Password has been changed successfully'); </script>";
                        echo "<script> location.href = './info.php' </script>";
                    }
                    else 
                    {
                        echo "<script> alert('Something went wrong !'); </script>";
                    }
                }
            }
        ?>
    </body>
</html>