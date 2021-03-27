<?php
    session_start();
    if(isset($_SESSION['Acc_no']))
    {
        $_SESSION['Acc_no']="";
        // header('location:../index.php');
    }
    include('../includes/connection.php');

    $query = "SELECT * from branch";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0)
    {
        $arr=array();
        while($row = $result->fetch_assoc()){
            array_push($arr, $row);
        }
    }
    else{
        echo "<script>alert('Something Wrong with Branches!');</script>";
    }

    $fname=$lname=$addr=$gender=$dob=$acctype=$branch=$interest="";    
    $pwd=$adhr="";

    if(isset($_POST['signup'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $addr = $_POST['addr'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $acctype = $_POST['acctype'];
        $branch = $_POST['branch'];
        $pwd = $_POST['pwd'];
        $adhr = $_POST['aadhar'];
        // $interest = $_POST['interest'];

        $valid = true;

        if(empty(trim($fname))){
            echo "<script>alert('First Name is empty!');</script>";
            $valid = false;
            $fname="";
        }
        else if(!preg_match("/^[a-zA-Z]*$/",$fname)){
            echo "<script>alert('First Name must only contain Alphabets!');</script>";
            $valid = false;
            $fname="";
        }

        if(empty(trim($lname))){
            echo "<script>alert('Last Name is empty!');</script>";
            $valid = false;
            $lname="";
        }
        else if(!preg_match("/^[a-zA-Z]*$/",$lname)){
            echo "<script>alert('Last Name must only contain Alphabets!');</script>";
            $valid = false;
            $lname="";
        }

        if(empty(trim($addr))){
            echo "<script>alert('Address is empty!');</script>";
            $valid = false;
            $addr="";
        }
        else if(!preg_match("/^[a-zA-Z0-9' ]*$/",$addr)){
            echo "<script>alert('Address must only contain Alphabets, Numbers and whitespaces!');</script>";
            $valid = false;
            $addr="";
        }

        if(empty(trim($dob))){
            echo "<script>alert('date of Birth is empty!');</script>";
            $valid = false;
            $dob="";
        }
        else{
          $temp = explode("-", $_POST["dob"]);
          $today = explode("-",date("Y-m-d"));
          if($temp[0]>$today[0] || 
            ($temp[0] == $today[0] && $temp[1]>$today[1]) ||
            ($temp[0] == $today[0] && $temp[1] == $today[1] && $temp[2]>=$today[2]))
          {
            echo "<script>alert('Date is in Future!');</script>";
            $valid = false;
            $dob="";
          }
        }

        if(empty(trim($gender))){
            echo "<script>alert('Gender is not selected!');</script>";
            $valid = false;
            $gender="";
        }

        if(empty(trim($acctype))){
            echo "<script>alert('Account Type is not selected!');</script>";
            $valid = false;
            $acctype="";
        }

        if(empty(trim($branch))){
            echo "<script>alert('Branch is Not selected!');</script>";
            $valid = false;
            $branch="";
        }
        if(empty(trim($pwd))){
            echo "<script>alert('Pwd cannot be empty!');</script>";
            $valid = false;
            $pwd="";
        }
        else if(!preg_match("/^[a-zA-Z0-9' @#$%^&*_]*$/",$pwd)){
            echo "<script>alert('First Name must only contain Alphabets, Numbers and whitespaces and special characters like(@,#,$,%,^,&,*,_)');</script>";
            $valid = false;
            $pwd="";
        }
        if(empty(trim($adhr))){
            echo "<script>alert('Aadhar Card cannot be empty!');</script>";
            $valid = false;
            $adhr="";
        }

        else if(!(strlen($adhr)==12)){
            echo "<script>alert('Aadhar Card number Length must be 12');</script>";
            $valid = false;
            $adhr="";
        }
        else if(!preg_match("/^[0-9]*$/",$adhr)){
            echo "<script>alert('First Name must only contain Numbers');</script>";
            $valid = false;
            $adhr="";
        }


        if($valid == true){
            $query = "INSERT INTO customer (First_name, Last_name, Date_of_birth, Gender, Password, Address, Branch_Code, Aadhar) VALUES ('$fname','$lname','$dob','$gender','$pwd','$addr','$branch','$adhr')";
            $result = mysqli_query($con,$query);

            if($result)
            {   
                $query = "SELECT * FROM customer WHERE Aadhar='$adhr'";
                $result = mysqli_query($con , $query);
                $accNo = "";

                if(mysqli_num_rows($result)>0)
                {
                    $result = mysqli_fetch_assoc($result);
                    $accNo = $result['Acc_no'];

                    if($acctype=="Saving") $interest=5;
                    else if($acctype=="Current") $interest=3.5;
                    else if($acctype=="Fix") $interest=7;

                    $query = "INSERT INTO account( Acc_no, Acc_type, Interest) VALUES ('$accNo', '$acctype','$interest')";
                    $result = mysqli_query($con,$query);

                    if($result)
                    {
                        echo "<script>alert('Signup Complete ! You Account Number is : $accNo, Login to continue...')</script>";
                        echo "<script> location.href = './login.php' </script>";
                    }
                    else
                    {
                        echo "<script> alert('Something went wrong ):'); </script>";
                    } 
                }
                else
                {
                    echo "<script> alert('Something went wrong ):'); </script>";
                } 
            }
            else
            {
                echo "<script>alert('Error in inserting');</script>";
            }
        }
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> SignUp </title>
        <script>
            function genInt(){
                if (ele.value == "Saving")
                {
                    document.getElementById("interest").value=5
                }
                else if(ele.value == "Current")
                {
                    document.getElementById("interest").value=3.5
                }
                else
                {
                    document.getElementById("interest").value=7
                }
            }
        </script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
         <title> Info_user </title>
 
         <style>
            .c1
            {
                background-color: rgba(0,0,0,0.5) !important;
                backface-visibility: hidden;
                border-radius: 9px;
                color: white;
                margin-left: 35%;
                margin-top: 5%;
                width: 30%;
                /* height: 40%; */
                padding: 15px;
                box-shadow: 0 8px 8px 0 rgba(255,255,255,0.2);
            }
            body{
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
                color: whitesmoke;
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
            <h2> Sign Up</h2>
            <hr class="c3">
            <form method="POST">

                <label for="fname">First Name</label> &emsp;
                <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname;?>" required><br>

                <label for="lname"> Last Name</label>  &emsp;
                <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required><br>
                
                
                <label for="addr"> Address &nbsp; </label> &emsp;
                <input type="text" id="addr" name="addr" placeholder="Address" value="<?php echo $addr;?>" required><br>
                
                <label for="dob"> Date of Birth </label> &nbsp;
                <input type="date" id="dob" name="dob" value="<?php echo $dob;?>" required style="background-color: white; border-radius: 5px;"><br>

                <label for="pwd">Password</label> &emsp;
                <input type="password" id="pwd" name="pwd" value="<?php echo $pwd;?>" placeholder="password" required><br>

                <label for="aadhar"> Aadhar No</label> &emsp;
                <input type="number" id="aadhar" name="aadhar" value="<?php echo $adhr;?>" placeholder="Aadhar Card Number" required><br>
            
                Gender :  &emsp;

                <select id="gender" name="gender"  style="border-radius: 5px;">
                    <option value="male" <?php if(isset($gender) && ($gender=="male")) echo "selected"; ?>>Male</option>
                    <option value="female" <?php if(isset($gender) && ($gender=="female")) echo "selected"; ?>>Female</option>
                    <option value="other" <?php if(isset($gender) && ($gender=="other")) echo "selected"; ?>>Other</option>
                </select>
                <br>
                <hr class="c3">

                Account type :
                <select name="acctype" id="acctype" style="border-radius: 5px;">
                    <option value="Current" <?php if(isset($acctype) && ($acctype=="Current")) echo "selected"; ?>>Current Account</option>
                    <option value="Saving" <?php if(isset($acctype) && ($acctype=="Savings")) echo "selected"; ?>>Saving Account</option>
                    <option value="Fix" <?php if(isset($acctype) && ($acctype=="Fix")) echo "selected"; ?>>Fix Account</option>
                </select>
                <br><br>
        
                Branch: &emsp; 
                <select name="branch" id="branch" style="border-radius: 5px;">
                    
                    <?php
                        foreach ($arr as $row) {
                            $nm = $row["Name"];
                            $brcode = $row["Branch_code"];
                            if(isset($branch) && $branch==$brcode){
                                echo "<option value='$brcode' selected> $nm </option>";
                            }
                            else{
                                echo "<option value='$brcode'> $nm </option>";    
                            }   
                        }
                    ?>
                </select>
            
                <br><br>
            
                <button type="submit" name="signup" onclick="return genInt()" class="btn btn-success btn-block">SignUp</button>
            
                <input type="hidden" id="interest" name="interest">
            </form>
        </div>
        
    </body>
</html>