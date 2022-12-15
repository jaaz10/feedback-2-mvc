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
$sql1 = "SELECT O_Name,O_Deliverystatus,O_Price,U_Name FROM `orders` INNER JOIN users where User_ID=U_id";
$result1 = mysqli_query($conn, $sql1);



//

//error_reporting(0);
if (!$_SESSION["login"]) {
  header("location:Admin_login.php?message=error");
}

//include("db_connect.php");


?>

<img src="img/logo1.png" class="w-25 mb-3" alt="">

<h2>All Orders</h2>
<? php;
echo isset($name) ? $name : ''; ?>
<p class="lead text-center">
<table class="table table-striped">
  <tr>
    <th>Order Name</th>
    <th>Delivery status</th>
    <th>Price</th>
    <th>Ordered by</th>
  </tr>
  <?php
  while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
    echo ('<tr>');
    echo ('<td>');
    echo ($row1["O_Name"]);
    echo ('</td>');
    echo ('<td>');
    if ($row1["O_Deliverystatus"] == 1) {
      echo ("<p style='color:Green'>Delivered</p>");
    } else {
      echo ("<p style='color:Red' >Pending delivery</p>");
    }
    echo ('</td>');
    echo ('<td>');
    echo ($row1["O_Price"]);
    echo ('</td>');
    echo ('<td>');
    echo ($row1["U_Name"]);
    echo ('</td>');;
    echo ('</tr>');
  }
  ?>
</table>
</p>

<?php include 'inc/footer.php'; ?>