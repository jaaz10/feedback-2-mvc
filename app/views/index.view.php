<?php include 'inc/header.php'; ?>




<?php
session_start();
//on click of submit button

// error_reporting(0);



if (isset($_POST["submit"])) {

    $error = null;

    // regex validation for name
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
        $error = "Only letters and white space allowed";
    }
    // regex validation for email
    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else if (strlen($_POST['body']) == 0) {
        $error = "Feedback required";
    }

    if ($error != null) {
        header('Location:index.php?error=' . $error);
    }



    //get data of the input fields

    //For security, I  use mysql real escape string real escape string
    //Is function is to omit any special characters in the input values
    //to prevent security attacks like SQL Injection
    $Name = mysqli_real_escape_string($conn, $_POST["name"]);
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $Feedback = mysqli_real_escape_string($conn, $_POST["body"]);
    //
    $time = date("H:i:s");
    $date = date('Y-m-d');
    $date_time = $date . " " . $time;

    //insertion in the database
    $sql = "INSERT INTO `feedback`(`name`, `email`, `body`, `date`) VALUES ('$Name','$Email','$Feedback','$date_time')";
    mysqli_query($conn, $sql);
}

// echo ('<script> swal({
//   title: "",
//   text: "Feedback Posted",
//   icon: "success",
//   button: "Ok",
//   timer: 2000
// });</script>');

?>

<img src="img/logo1.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>
<?php echo isset($name) ? $name : ''; ?>
<p class="lead text-center">Leave feedback for Pizza Panda</p>

<?php

if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger'>  " . $_GET['error'] . "  </div>";
}
?>

<form method="POST" action="index.php" class="mt-4 w-75">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !$nameErr ?:
                                                    'is-invalid'; ?>" id="name" name="name" placeholder="Enter your name" required>
        <div id="validationServerFeedback" class="invalid-feedback">
            Please provide a valid name.
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !$emailErr ?:
                                                    'is-invalid'; ?>" id="email" type="email" name="email" required placeholder="Enter your email" ?>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo !$bodyErr ?:
                                            'is-invalid'; ?>" id="body" required name="body" placeholder="Enter your feedback"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-dark w-100">Send</button>
    </div>
</form>

<?php include 'inc/footer.php'; ?>