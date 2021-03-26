<?php
    session_start();
    include('../includes/connection.php');

    $accNo = $_SESSION['Acc_no'];

    $query = "SELECT * FROM `transaction` where Acc_no='$accNo'";
    $result = mysqli_query($con , $query);

    // print_r($result);

    $details = array();
    if(mysqli_num_rows($result) > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($details,$row);
        }
    }

    // echo "<hr>";
    // print_r($details);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mini statement</title>
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
            margin-left: 15%;
            margin-top: 10px;
            width: 70%;
            /* height: 500px; */
            padding: 15px;
            box-shadow: 0 8px 20px 0 rgba(255,255,255,0.2);
            text-align: center;
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
        
        th, tr , td
        {
            text-align: center;
        }
        
    </style>

</head>
<body>

    <br>
    <div class="c2"> Transaction Details</div>

    <div class="c1">
        <table >

            <?php

                echo "<tr>";
                echo "<th>"."Date"."</th>";
                echo "<th>"."Type of Transaction"."</th>";
                echo "<th>"."Amount"."</th>";
                echo "<th>"."Closing Balance"."</th>";
                echo "</tr>";

                foreach($details as $arr)
                {
                    echo "<tr>";
                    echo "<td width='25%'>".$arr['Date']."</td>";
                    echo "<td width='25%'>".$arr['Type']."</td>";
                    echo "<td width='25%'>".$arr['Amt']."</td>";
                    echo "<td width='25%'>".$arr['Closing_bal']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        
        
    </div>
</body>
</html>