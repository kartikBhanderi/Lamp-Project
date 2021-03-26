<?php
session_start();
if (!isset($_SESSION['Mang_id'])) {
    header('location:./login.php');
}
include('../includes/connection.php');
?>

<?php

$fname = $lname = $dob = $gender = $id = $pwd = $address = '';

if (isset($_POST["add"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $address = $_POST['address'];

    if (!preg_match("/^[a-zA-Z' ]*$/", $fname)) {
        echo "<script> alert('First name should only consist alphabets and whitespaces'); </script>";
    } else if (!preg_match("/^[a-zA-Z' ]*$/", $lname)) {
        echo "<script> alert('Last name should only consist alphabets and whitespaces'); </script>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $gender)) {
        echo "<script> alert('Gender should only consist alphabets'); </script>";
    } else if (!preg_match("/^[0-9]*$/", $id)) {
        echo "<script> alert('Id should only consist numbers'); </script>";
    } else {
        $query = "INSERT INTO employee (First_name, Last_name, Date_of_birth, Gender, Employee_id, Password, Address) VALUES ('$fname', '$lname', '$dob', '$gender', '$id', '$pwd', '$address')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script> alert('Employee has been Added successfully'); </script>";
            echo "<script> location.href = '../manager/maccess.php' </script>";
        } else {
            echo $result;
            echo "<script> alert('Something went wrong !'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title> addEmployee </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .c1 {
            background-color: rgba(0, 0, 0, 0.5) !important;
            backface-visibility: hidden;
            border-radius: 9px;
            color: white;
            margin-left: 34%;
            margin-top: 100px;
            width: 32%;
            /* height: 500px; */
            padding: 15px;
            box-shadow: 0 8px 8px 0 rgba(255, 255, 255, 0.2);

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
            background: none;
            border-bottom-color: green;
            color: white;
        }

        input[type="number"] {
            border-top: hidden;
            border-left: hidden;
            border-right: hidden;
            background: none;
            border-bottom-color: green;
            color: white;
        }

        input[type="password"] {
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
        <h2 style="text-align: left;"> Add Employee </h2>
        <hr class="c3">
        <form action="" method="POST">
            <table border="0" cellpadding="5px">
                <tr>
                    <td>
                        <label for="fname">First name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" id="fname" name="fname" value="<?php echo $fname ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="lname">Last Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" id="lname" name="lname" value="<?php echo $lname ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Date of Birth </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="date" id="dob" name="dob" value="<?php echo $dob ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gender">Gender </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" id="gender" name="gender" value="<?php echo $gender ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="id">Employee ID </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="number" id="id" name="id" value="<?php echo $id ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pwd">Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" id="pwd" name="pwd" value="<?php echo $pwd ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" id="address" name="address" value="<?php echo $address ?>" required>
                    </td>
                </tr>
            </table>
            <br>
            <button type="submit" name="add" class="btn btn-success btn-block">Add</button>
        </form>
    </div>

</body>

</html>