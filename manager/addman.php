<?php
    session_start();
    if(!isset($_SESSION['Mang_id']))
    {
        header('location:./login.php');
    }
    include('../includes/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title> addManager </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
            .c1
           {
               background-color: rgba(0,0,0,0.5) !important;
               backface-visibility: hidden;
               border-radius: 9px;
               color: white;
               margin-left: 35%;
                margin-top: 15%;
                width: 30%;
                /* height: 40%; */
               padding: 15px;
               box-shadow: 0 8px 8px 0 rgba(255,255,255,0.2);
               text-align: left;
           }
           body{
                background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg") ;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover;
                overflow: hidden;
                background-position: center;
                
            }
           
           input
           {
               border-radius: 5px;
               border-bottom-color: green;
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
            <h2 style="text-align: left;"> Add Manager </h2>
            <hr class="c3">
            <form method="POST">
                <table border="0" cellpadding="5px">
                	<tr>
                		<td>
                			<label for="id">Manager ID </label> 			
                		</td>
                		<td>:</td>
                		<td>
                			<input type="text" id="id" name="id" required>		
                		</td>
                	</tr>
                	<tr>
                		<td>
                			<label for="pwd">Password </label>
                		</td>
                		<td>:</td>
                		<td>
                			<input type="password" id="pwd" name="pwd" required>
                		</td>
                	</tr>
                </table>
                <br>
                <button type="submit" name="add" class="btn btn-success btn-block"  >Add</button>
            </form>
        </div>
        <?php
        	if(isset($_POST["add"])){
        		$newid = $_POST['id'];
        		$newpwd = $_POST['pwd'];

        		$query = "INSERT INTO manager (Mang_id, Password) VALUES ($newid, $newpwd)"; 
        		$result = mysqli_query($con,$query);
        		echo "Result".$result;
	    		if($result)
                    {
                        echo "<script> alert('Manager has been Added successfully'); </script>";
                        echo "<script> location.href = './maccess.php' </script>";
                    }
                    else 
                    {
                        echo "<script> alert('Something went wrong !'); </script>";
                    }
        	}

        ?>
    </body>
</html>
