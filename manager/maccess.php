<?php
session_start();
if (!isset($_SESSION['Mang_id'])) {
    header('location:./login.php');
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title> Info_manger </title>

    <style>
        .c1 {
            background-color: rgba(0, 0, 0, 0.7) !important;
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
    </style>
</head>

<body>
    <div class="c2">
        Manager Access
    </div>

    <form method="post">
        <div class="c1">
            <a href="./addman.php" class="btn btn-outline-info btn-block">Add manager</a>
            <hr class="c3">
            <a href="../employee/addemp.php" class="btn btn-outline-info btn-block">Add employee</a>
            <hr class="c3">
            <a href="./Filter.php" class="btn btn-outline-info btn-block">Employee Details</a>
            <hr class="c3">
            <button type="submit" name="logout" class="btn btn-outline-danger btn-block"> Log Out</button>
        </div>
    </form>

    <?php
    if (isset($_POST["logout"])) {
        session_destroy();
        echo "<script > location.href = '../index.php' </script> ";
    }
    ?>
</body>

</html>