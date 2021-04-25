<?php
session_start();
include('../includes/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Give_service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        function getamt() {
            var ele = document.getElementById("selection")
            var tmp = document.getElementById("amount")

            if (ele.value == "1") {
                document.getElementById("amt").value = tmp.value
            } else {
                document.getElementById("amt").value = -tmp.value
            }
        }
    </script>

    <style>
        .c1 {
            background-color: rgba(0, 0, 0, 0.5) !important;
            backface-visibility: hidden;
            border-radius: 9px;
            color: white;
            margin-left: 460px;
            margin-top: 140px;
            width: 380px;
            height: 365px;
            padding: 10px;
            box-shadow: 0 8px 8px 0 rgba(255, 255, 255, 0.2);
            text-align: left;
        }

        body {
            background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg");
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
            background-position: center;

        }

        input {
            border-radius: 5px;
            border-bottom-color: green;
        }

        .c3 {
            height: 1px;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="c1">

        <form action="" method="POST">

            <h2>Details</h2>
            <hr class="c3">

            <label for="accno"> Account Number : </label>
            <input type="number" id="accno" name="accno"><br><br>

            <label for="pwd"> Password : </label>
            <input type="password" id="pwd" name="pwd"><br><br>

            Type :
            <select name="selection" id="selection">
                <option value="1"> Credit </option>
                <option value="2"> Debit </option>
            </select>
            <br><br>
            <label for="amount"> Amount </label>
            <input type="number" id="amount" name="amount"><br><br>

            <button type="submit" name="submit" onclick="return getamt()" class="btn btn-success btn-block">Confirm</button>
            <input type="hidden" id="amt" name="amt">

        </form>

    </div>

    <?php
    if (isset($_POST['submit'])) {
        $accno = $_POST['accno'];
        $pwd = $_POST['pwd'];
        $selection = $_POST['selection'];
        $amount = $_POST['amount'];



        if (empty($amount) || $amount <= 0) {
            echo "<script> alert('Enter valid amount'); </script>";
        } else {
            if ($selection == "2") $amount = -$amount;
            $query = "SELECT * FROM `customer` NATURAL JOIN `account` WHERE Acc_no='$accno'AND `Password` ='$pwd'";

            $result = mysqli_query($con, $query);
            $result1 = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) > 0) {
                $curr_ammount = $result1['Balance'];
                $new_ammount = $result1['Balance'] + $amount;
                if ($new_ammount < 0) {
                    echo "<script> alert('You don't have enough balance'); </script>";
                } else {
                    $query1 = "UPDATE `account` SET `Balance` = '$new_ammount' WHERE `Acc_no` = '$accno'";
                    $result2 = mysqli_query($con, $query1);
                    $date=date("d/m/y");
                    if($selection=="1"){
                        $query2 = "INSERT INTO `transaction`(`Acc_no`, `Type`, `Amt`, `Date`, `Closing_bal`) VALUES ('$accno','Credit','$amount','$date','$new_ammount')";
                    }
                    else{
                        $query2 = "INSERT INTO `transaction`(`Acc_no`, `Type`, `Amt`, `Date`, `Closing_bal`) VALUES ('$accno','Debit','$amount','$date','$new_ammount')";   
                    }
                    $result = mysqli_query($con,$query2);
                    if($result){
                        echo "<script> alert('balance changed from {$curr_ammount} to {$new_ammount}'); </script>";
                        echo "<script> location.href = './eaccess.php' </script>";    
                    }
                    else{
                        echo "<script> alert('Error in transaction !'); </script>";        
                    }
                    
                }
            } else {
                echo "<script> alert('Account details not found !'); </script>";
            }
        }
    }
    ?>

</body>

</html>