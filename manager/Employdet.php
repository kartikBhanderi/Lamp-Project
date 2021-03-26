<?php
    session_start();
    if(!isset($_SESSION['Mang_id']))
    {
        header('location:../login.php');
    }
    include('../includes/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            * {
                font-family: sans-serif; /* Change your font family */
              }
              
              .content-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 700px;
                border-radius: 5px 5px 0 0;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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
              .c1
            {
                background-color: rgba(0,0,0,0.5) !important;
                backface-visibility: hidden;
                border-radius: 9px;
                color: white;
                margin-left: 25%;
                margin-top: 10%;
                width: 50%;
                /* height: 40%; */
                padding: 15px;
                box-shadow: 0 8px 16px 0 rgba(0,125,0,0.4);
            }
            body{
                /*background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg") ;*/
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
                outline: none;
                background: none;
                color: whitesmoke;
                
                border-bottom-color: green;
            }
            input[type="number"]
            {
                border-top: hidden;
                border-left: hidden;
                border-right: hidden;
                background: none;
                color: whitesmoke;
                outline: none;
                border-bottom-color: green;
            }
            input[type="password"]
            {
                border-top: hidden;
                border-left: hidden;
                border-right: hidden;
                background: none;
                color: whitesmoke;
                outline: none;
                border-bottom-color: green;
            }
            .c2
            {
                color: whitesmoke;
                font-size: 60px;
                font-family: cursive;
                text-align: center;
                
            }

        </style>
          
        <script>
            function addfilter(){
                // alert("Executing");
                var r1=document.getElementById("row1");
                var r2=document.getElementById("row2");
                var r3=document.getElementById("row3");
                var r4=document.getElementById("row4");
                var r5=document.getElementById("row5");
                if(r1.style.display==="none"){
                    r1.style.display="table-row";
                }
                else if(r2.style.display==="none"){
                    r2.style.display="table-row";
                }
                else if(r3.style.display==="none"){
                    r3.style.display="table-row";
                }
                else if(r4.style.display==="none"){
                    r4.style.display="table-row";
                }
                else if(r5.style.display==="none"){
                    r5.style.display="table-row";
                }
                else{
                    alert("Max filters");
                }
            }
            function selected(){
                var s1 = document.getElementById("attr1");
                var s2 = document.getElementById("attr2");
                var s3 = document.getElementById("attr3");
                var s4 = document.getElementById("attr4");
                var s5 = document.getElementById("attr5");
                var v1 = s1.options[s1.selectedIndex].value;
                var v2 = s1.options[s2.selectedIndex].value;
                var v3 = s1.options[s3.selectedIndex].value;
                var v4 = s1.options[s4.selectedIndex].value;
                var v5 = s1.options[s5.selectedIndex].value;
                document.getElementById("val1").value = v1;
                document.getElementById("val2").value = v2;
                document.getElementById("val3").value = v3;
                document.getElementById("val4").value = v4;
                document.getElementById("val5").value = v5;
                var vv1 = document.getElementById("attr1inp").value;
                var vv2 = document.getElementById("attr2inp").value;
                var vv3 = document.getElementById("attr3inp").value;
                var vv4 = document.getElementById("attr4inp").value;
                var vv5 = document.getElementById("attr5inp").value;
                var vvv1 = document.getElementById("val1").value;
                var vvv2 = document.getElementById("val2").value;
                var vvv3 = document.getElementById("val3").value;
                var vvv4 = document.getElementById("val4").value;
                var vvv5 = document.getElementById("val5").value;
                document.getElementById("inpval1").value = vv1;
                document.getElementById("inpval2").value = vv2;
                document.getElementById("inpval3").value = vv3;
                document.getElementById("inpval4").value = vv4;
                document.getElementById("inpval5").value = vv5;
                // alert(vvv1+"->"+vv1);
                // alert(vvv2+"->"+vv2);
                // alert(vvv3+"->"+vv3);
                // alert(vvv4+"->"+vv4);
                // alert(vvv5+"->"+vv5);
            }
        </script>

        <title> Input </title>
        <body>
            <div class="c2">Employee Details</div>
            <div class="c1">      
                <center><table class="content-table">
                    <tr id="row1" style="display: none;" >
                        <td>
                            Select Attribute 1
                        </td>
                        <td id="r1c1" name="r1c1">
                            <select id="attr1" name="attr1" onchange="(function(){
                                document.getElementById('r1c2').style.display='table-cell';
                                document.getElementById('attr1inp').focus();
                                })()">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="First_name">First Name</option>
                                <option value="Last_name">Last Name</option>
                                <option value="Gender">Gender</option>
                                <option value="Branch_code">Branch Code</option>
                                <option value="Employee_id">Employee Id</option>
                            </select>
                        </td>
                        <td id="r1c2" name="r1c2" style="display: none;">
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="attr1inp" name="attr1inp" required>
                        </td>
                    </tr>
                    <tr id="row2" style="display: none;">
                        <td>
                            Select Attribute 2
                        </td>
                        <td>
                            <select id="attr2" name="attr2" onchange="(function(){
                                document.getElementById('r2c2').style.display='table-cell';
                                document.getElementById('attr2inp').focus();
                                })()">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="First_name">First Name</option>
                                <option value="Last_name">Last Name</option>
                                <option value="Gender">Gender</option>
                                <option value="Branch_code">Branch Code</option>
                                <option value="Employee_id">Employee Id</option>
                            </select>
                        </td>
                        <td id="r2c2" name="r2c2" style="display: none;">
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text"  id="attr2inp" name="attr2inp" required>
                        </td>
                    </tr>
                    <tr id="row3" style="display: none;">
                        <td>
                            Select Attribute 3
                        </td>
                        <td>
                            <select id="attr3" name="attr3" onchange="(function(){
                                document.getElementById('r3c2').style.display='table-cell';
                                document.getElementById('attr3inp').focus();
                                })()">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="First_name">First Name</option>
                                <option value="Last_name">Last Name</option>
                                <option value="Gender">Gender</option>
                                <option value="Branch_code">Branch Code</option>
                                <option value="Employee_id">Employee Id</option>
                            </select>
                            <br>
                        </td>
                        <td id="r3c2" name="r3c2" style="display: none;">
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="attr3inp" name="attr3inp" required>
                        </td>
                    </tr>
                    <tr id="row4" style="display: none;">
                        <td>
                            Select Attribute 4
                        </td>
                        <td>
                            <select id="attr4" name="attr4" onchange="(function(){
                                document.getElementById('r4c2').style.display='table-cell';
                                document.getElementById('attr4inp').focus();
                                })()">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="First_name">First Name</option>
                                <option value="Last_name">Last Name</option>
                                <option value="Gender">Gender</option>
                                <option value="Branch_code">Branch Code</option>
                                <option value="Employee_id">Employee Id</option>
                            </select>
                            <br>
                        </td>
                        <td id="r4c2" name="r4c2" style="display: none;">
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="attr4inp" name="attr4inp" required>
                        </td>
                    </tr>
                    <tr id="row5" style="display: none;">
                        <td>
                            Select Attribute 5
                        </td>
                        <td>
                            <select id="attr5" name="attr5" onchange="(function(){
                                document.getElementById('r5c2').style.display='table-cell';
                                document.getElementById('attr5inp').focus();
                                })()">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="First_name">First Name</option>
                                <option value="Last_name">Last Name</option>
                                <option value="Gender">Gender</option>
                                <option value="Branch_code">Branch Code</option>
                                <option value="Employee_id">Employee Id</option>
                            </select>
                            <br>
                        </td>
                        <td id="r5c2" name="r5c2" style="display: none;">
                            &emsp;&emsp; : &emsp;&emsp;
                            <input type="text" id="attr5inp" name="attr5inp" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <button onclick="addfilter()">Add Filter</button>
                        </td>
                    </tr>
                </table></center>
                <form method="POST">
                    <button type="submit" name="search" onclick="return selected()">Search</button>
                    <input type="hidden" id="val1" name="val1">
                    <input type="hidden" id="val2" name="val2">
                    <input type="hidden" id="val3" name="val3">
                    <input type="hidden" id="val4" name="val4">
                    <input type="hidden" id="val5" name="val5">
                    <input type="hidden" id="inpval1" name="inpval1">
                    <input type="hidden" id="inpval2" name="inpval2">
                    <input type="hidden" id="inpval3" name="inpval3">
                    <input type="hidden" id="inpval4" name="inpval4">
                    <input type="hidden" id="inpval5" name="inpval5">
                </form>
            </div>

            <?php

            	function validateNames($val){
            		if(!preg_match("/^[a-zA-Z' ]*$/",$val))
			        {
			            echo "<script> alert('Names should only consist alphabets and whitespaces'); </script>";
			            return false;
			        }
            	}
            	function validateGender($val){
            		if(!preg_match("/[mf]/i",$val))
			        {
			            echo "<script> alert('Gender should only of single letter m or f'); </script>";
			            return false;
			        }
            	}
            	function validateBranchCode($val){

            	}
            	function validateEmployeeId($val){

            	}
            	function validate($atr,$val){
            		if($atr=="First_name" || $atr=="Last_name")
            			return validateNames($val);
            		else if($atr=="Gender")
            			return validateGender($val);
            		else if($atr=="Branch_code")
            			return validateBranchCode($val);
            		else if($atr=="Employee_id")
            			return validateEmployeeId($val);
            		else return false;
            	}
            	if(isset($_POST['search'])){
            		$atr1 = $_POST['val1'];
            		$atr2 = $_POST['val2'];
            		$atr3 = $_POST['val3'];
            		$atr4 = $_POST['val4'];
            		$atr5 = $_POST['val5'];

            		$inp1 = $_POST['inpval1'];
            		$inp2 = $_POST['inpval2'];
            		$inp3 = $_POST['inpval3'];
            		$inp4 = $_POST['inpval4'];
            		$inp5 = $_POST['inpval5'];
         			
            		$query = "SELECT * FROM Employee";
				    $first=true;
				    if($atr1!=="" && $inp1===""){
				        echo "<script> alert('First Entry is Empty'); </script>";
				    }
				    else{
				        if($first==true){
				            $first=false;
				            $query.=" WHERE $atr1 = $inp1";
				        }
				        else{
				            $query.=" AND $atr1 = $inp1";
				        }
				    }
				    if($atr2!=="" && $inp2===""){
				        echo "<script> alert('Second Entry is Empty'); </script>";
				    }
				    else{
				        if($first==true){
				            $first=false;
				            $query.=" WHERE $atr2 =$inp2";
				        }
				        else{
				            $query.=" AND $atr2 = $inp2";
				        }
				    }
				    if($atr3==="" && $inp3===""){
				        echo "Third entry null";
				    }
				    else{
				        if($first==true){
				            $first=false;
				            $query.=" WHERE $atr3 =$inp3";
				        }
				        else{
				            $query.=" AND $atr3 = $inp3";
				        }
				    }
				    if($atr4==="" && $inp4===""){
				        echo "Fourth entry null";
				    }
				    else{
				        if($first==true){
				            $first=false;
				            $query.=" WHERE $atr4 =$inp4";
				        }
				        else{
				            $query.=" AND $atr4 = $inp4";
				        }
				    }
				    if($atr5==="" && $inp5===""){
				        echo "Fifth entry null";
				    }
				    else{
				        if($first==true){
				            $first=false;
				            $query.=" WHERE $atr5 =$inp5";
				        }
				        else{
				            $query.=" AND $atr5 = $inp5";
				        }
				    }
				    $query.=";";
				    echo "Query:$query";
            	}

            ?>
        </body>
    </head>
</html>