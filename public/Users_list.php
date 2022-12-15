<?php include 'inc/header_admin.php'; ?>

<?php
session_start();
//on click of submit button
//var_dump($_SESSION);
$name = $_SESSION["login"];
//get the id of the user that is logged in
// $sql = "SELECT * FROM `admin_` WHERE U_Name='$name'";
//$result=mysqli_query($conn,$sql);
//$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
//$id=$row["U_Id"];

//----------------------------------------------

//Selecting orders 
$sql1 = "SELECT * FROM `users`";
$result1 = mysqli_query($conn, $sql1);



//

//error_reporting(0);
if (!$_SESSION["login"]) {
  header("location:Admin_login.php?message=error");
}

//include("db_connect.php");


?>

<img src="img/logo1.png" class="w-25 mb-3" alt="">

<h2>All Users</h2>
<? php;
echo isset($name) ? $name : ''; ?>
<p class="lead text-center">
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>City</th>
    <th>Phone</th>
  </tr>
  <?php
  while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
    echo ('<tr>');
    echo ('<td>');
    echo ($row1["U_Name"]);
    echo ('</td>');
    echo ('<td>');
    echo ($row1["U_City"]);
    echo ('</td>');
    echo ('<td>');
    echo ($row1["U_Phone"]);
    echo ('</td>');
    echo ('</tr>');
  }
  ?>
</table>
</p>

<?php include 'inc/footer.php'; ?>