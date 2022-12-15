<?php
include("db_connect.php");
$name=mysqli_real_escape_string($conn, $_POST["Username"]);
$pass=mysqli_real_escape_string($conn,  $_POST["Password"]);
$sql="SELECT * FROM `admin_credientials` WHERE A_Name='$name' and A_Password='$pass'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count)
{
    session_start();
$_SESSION["login"]=$name;
echo(1);
}
else
{
    echo(0);
}
?>