<?php
    session_start();
    include('../includes/connection.php');

    $accNo = $_SESSION['Acc_no'];
    $pwd = $_SESSION['Password'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
         <title> Update info </title>
 
         <style>
            .c1
            {
                background-color: rgba(0,0,0,0.5) !important;
                backface-visibility: hidden;
                border-radius: 9px;
                color: white;
                margin-left: 33%;
                
                margin-top: 15%;
                width: 35%;
                /* height: 330px; */
                padding: 10px;
                box-shadow: 0 8px 16px 0 rgba(0,125,0,0.4);
            }
            body
            {
                background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg") ;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover;
                overflow: hidden;
                background-position: center;
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
            input[type="text"]
            {
                border-top: hidden;
                border-left: hidden;
                border-right: hidden;
                background: none;
                border-bottom-color: green;
                color: white;
            }
            input[type="number"]
            {
                border-top: hidden;
                border-left: hidden;
                border-right: hidden;
                background: none;
                border-bottom-color: green;
                color: white;
            }
            input[type="password"]
            {
                border-top: hidden;
                border-left: hidden;
                border-right: hidden;
                background: none;
                border-bottom-color: green;
                color: white;
            }
             
         </style>
    </head>

    <body>
        <div class="c1">
            <form action="" method="POST">
                <h2>Update Information</h2>
                <hr class="c3">
                <div>
                    <label for="fname"> First Name : </label>
                    <input type="text" id="fname" name="fname" required><br>

                    <label for="lname"> Last Name : </label>
                    <input type="text" id="lname" name="lname" required><br>
                </div>
                <div>
                    <label for="addr"> Address : </label>
                    <input type="text" id="addr" name="addr" required><br>
                </div>
                <div>
                    <label for="dob" > Date of Birth : </label>
                    <input type="date" style="border-radius: 4px;" id="dob" name="dob" required> <br>
                </div>

                <div>
                    <label for="aadhar"> Aadhar No : </label>
                    <input type="number" id="aadhar" name="aadhar" required> <br>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-success btn-block"> Update </button>

            </form>
        </div>

        <?php
            if(isset($_POST['submit']))
            {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $addr = $_POST['addr'];
                $dob = $_POST['dob'];
                $aadhar = $_POST['aadhar'];

                
                $query = "UPDATE customer SET First_name='$fname',Last_name='$lname',Date_of_birth='$dob',Address='$addr',Aadhar='$aadhar' WHERE Acc_no = '$accNo'"; 
                $result = mysqli_query($con,$query);
                if($result)
                {
                    $query = "SELECT * FROM customer WHERE Acc_no='$accno' AND `Password` ='$pwd'";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0)
                    {
                        $result = mysqli_fetch_assoc($result);
                        
                        $_SESSION['First_name'] = $result['First_name'];
                        $_SESSION['Last_name'] = $result['Last_name'];
                        $_SESSION['Date_of_birth'] = $result['Date_of_birth'];
                        $_SESSION['Gender'] = $result['Gender'];
                        $_SESSION['Password'] = $result['Password'];
                        $_SESSION['Address'] = $result['Address'];
                        $_SESSION['Branch_Code'] = $result['Branch_Code'];
                        $_SESSION['Acc_no'] = $result['Acc_no'];
                        $_SESSION['Aadhar'] = $result['Aadhar'];
                    } 
                    echo "<script> alert('Information has been changed successfully !'); </script>";
                    echo "<script> location.href = './info.php' </script>";
                }
                else 
                {
                    echo "<script> alert('Something went wrong !'); </script>";
                }
            }
        ?>
    </body>
</html>