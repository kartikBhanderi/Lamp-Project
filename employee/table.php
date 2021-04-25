<?php
session_start();
if (!isset($_SESSION['Employee_id'])) {
    header('location:./login.php');
}
if (!isset($_SESSION['Emp_result'])) {
    header('location:./Filter.php');
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
            margin: 25px 0;
            font-size: 0.9em;
            width: 100%;
            /* min-width: 500px; */
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table tr:first-of-type {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
            /* position: fixed; */
            /* width: 100%;r */
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        /* .content-table tbody tr {
                border-bottom: 1px solid #dddddd;
              } */

        .content-table tr:nth-of-type(even) {
            background-color: rgb(1, 1, 1, 0.3);
            /* #1a1919*/
        }

        .content-table tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .content-table tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .c1 {
            background-color: rgba(0, 0, 0, 0.5) !important;
            backface-visibility: hidden;
            border-radius: 9px;
            color: white;
            /* margin-left: 100px; */
            /* margin-top: 150px; */
            width: 100%;
            /* height: 330px; */
            /* padding: 10px; */
            /* box-shadow: 0 8px 16px 0 rgba(0,125,0,0.4); */
        }

        html
        {
            height: 100%;
            width: 100%;
        }
        
        body {
            background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg") ;
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
        }

        input[type="number"] {
            border-top: hidden;
            border-left: hidden;
            border-right: hidden;
            background: none;
            border-bottom-color: green;
        }

        input[type="password"] {
            border-top: hidden;
            border-left: hidden;
            border-right: hidden;
            background: none;
            border-bottom-color: green;
        }
    </style>
    <title> Details </title>

<body>
    <div class="c1">
        <table class="content-table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Branch Code</th>
                <th>Account No</th>
                <th>Aadhar No</th>
            </tr>
            <?php
            foreach ($_SESSION['Emp_result'] as $row) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    if ($key != "Password")
                        echo "<td>$value</td>";
                }
                echo "</tr>";
            }

            ?>
        </table>
    </div>
</body>
</head>

</html>