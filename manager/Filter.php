<?php
session_start();
if (!isset($_SESSION['Mang_id'])) {
    header('location:./login.php');
}
include('../includes/connection.php');
$fname = $lname = $gender = $empid = "";

// $fname=$lname=$gender=$brcode=$empid="";
if (isset($_POST['search'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $empid = $_POST['empid'];
    $valid = true;
    if (!empty($fname) && !preg_match("/^[a-zA-Z' ]*$/", $fname)) {
        echo "<script> alert('First Name should only consist alphabets and whitespaces'); </script>";
        $fname = "";
        $valid = false;
    }
    if (!empty($lname) && !preg_match("/^[a-zA-Z' ]*$/", $lname)) {
        echo "<script> alert('Lname should only consist alphabets and whitespaces'); </script>";
        $lname = "";
        $valid = false;
    }
    if (!empty($gender) && !preg_match("/^[FMfm]$/", $gender)) {
        echo "<script> alert('Gender should only consist of single letter either F or M'); </script>";
        $gender = "";
        $valid = false;
    }
    if (!empty($empid) && !preg_match("/^[0-9]*$/", $empid)) {
        echo "<script> alert('Employee id should only consist of numbers'); </script>";
        $empid = "";
        $valid = false;
    }
    if ($valid == true) {
        $query = "SELECT * FROM Employee";
        $first = true;
        if (!empty($fname)) {
            if ($first == true) {
                $first = false;
                $query .= " WHERE First_name = '$fname'";
            } else {
                $query .= " AND First_name = '$fname'";
            }
        }
        if (!empty($lname)) {
            if ($first == true) {
                $first = false;
                $query .= " WHERE Last_name = '$lname'";
            } else {
                $query .= " AND Last_name = '$lname'";
            }
        }
        if (!empty($gender)) {
            if ($first == true) {
                $first = false;
                $query .= " WHERE Gender = '$gender'";
            } else {
                $query .= " AND Gender = '$gender'";
            }
        }
        if (!empty($empid)) {
            if ($first == true) {
                $first = false;
                $query .= " WHERE Employee_id = '$empid'";
            } else {
                $query .= " AND Employee_id = '$empid'";
            }
        }

        $query .= ";";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                array_push($arr, $row);
            }
            // $result = mysqli_fetch_assoc($result);
            // print_r($arr);
            $_SESSION["Mang_result"] = $arr;
            echo "<script> location.href ='./table.php'</script>";
        } else {
            echo "<script>alert('No records Found');</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: sans-serif;
            /* Change your font family */
        }

        .content-table {
            border-collapse: collapse;
            width: 100%;
            padding: 10px;
            /* margin: 25px 0;
            font-size: 0.9em;
            min-width: 700px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); */
        }

        .content-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
            color: #009879;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        /* .content-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
              } */

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .content-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .c1 {
            background-color: rgba(0, 0, 0, 0.5) !important;
            backface-visibility: hidden;
            border-radius: 9px;
            color: white;
            margin-left: 25%;
            margin-top: 10%;
            width: 50%;
            /* height: 40%; */
            padding: 15px;
            box-shadow: 0 8px 16px 0 rgba(0, 125, 0, 0.4);
        }

        body {
            background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg");
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
            background-position: center;

        }

        .c2 {
            color: whitesmoke;
            font-size: 60px;
            font-family: cursive;
            text-align: center;

        }

        .c3 {
            height: 1px;
            background-color: white;
        }

        input[type="text"] {
            border-top: hidden;
            border-left: hidden;
            border-right: hidden;
            outline: none;
            background: none;
            color: whitesmoke;

            border-bottom-color: green;
        }

        input[type="number"] {
            border-top: hidden;
            border-left: hidden;
            border-right: hidden;
            background: none;
            color: whitesmoke;
            outline: none;
            border-bottom-color: green;
        }

        input[type="password"] {
            border-top: hidden;
            border-left: hidden;
            border-right: hidden;
            background: none;
            color: whitesmoke;
            outline: none;
            border-bottom-color: green;
        }

        .c2 {
            color: whitesmoke;
            font-size: 60px;
            font-family: cursive;
            text-align: center;

        }
    </style>


    <title> Input </title>

<body>
    <form method="post">
        <div class="c2">Employee Details</div>
        <div class="c1">
            <center>
                <table class="content-table">
                    <tr>
                        <td>
                            First Name
                        </td>
                        <td>
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Last Name
                        </td>
                        <td>
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender
                        </td>
                        <td>
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Employe Id
                        </td>
                        <td>
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="empid" name="empid" value="<?php echo $empid; ?>">
                        </td>
                    </tr>
                </table>
            </center>

            <br>
            <button type="submit" name="search" onclick="return selected()">Search</button>
        </div>
    </form>


</body>
</head>

</html>