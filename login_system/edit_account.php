<?php
require '../database/database.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../login_system/login.php");
    exit;
}
$oldPassword = false;
$notChange = false;
$notMatch = false;
$failedOldPassword = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $old_password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $c_password = $_POST['c_password'];
    $email = $_SESSION['email'];


    $qurey = "Select * from users where email = '$email' ";
    $result = mysqli_query($conn, $qurey);

while ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($old_password,$row['password'])){
        if ( $new_password === $c_password){

            $hash = password_hash($new_password,PASSWORD_DEFAULT);
            $insert = "update users set password='$hash' where email ='$email'";
               $ans = mysqli_query($conn,$insert);
               if ($ans){
                   $oldPassword = true;
               }
               else{
                   $notChange = true;
               }
        }else{
            $notMatch = true;
        }

    }else{
        $failedOldPassword = true;
    }

}
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>

        #form{

            width: 50%;
            height: 50%;
            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 220px;
        }
        #oldPassword{
            color: lawngreen;
        }
        #passwordMatch{
            color: red;
        }

    </style>

</head>
<body>
<?php
require '../navbar/header.php';
?>

<div class="container-fluid">
    <div class="row">


        <?php
        require '../navbar/leftbar.php';
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Change Password</h1>
            </div>
            <hr>
        <div id="form">
            <form action="edit_account.php" method="post">
                <?php
                if ($oldPassword){
                    echo "<p id='oldPassword'>Password has been changed successfully! </p>";
                }           elseif ($notChange){
                    echo "<p id='passwordMatch'>Your old Password is not change! </p>";

                } elseif ($notMatch){
                    echo "<p id='passwordMatch'>Your Password is not match! </p>";

                }elseif ($failedOldPassword){
                    echo "<p id='passwordMatch'>Your old Password is not match! </p>";

                }

                ?>

                <div class="row mt-4">
                    <div class="col-sm-3">
                        <label for="password" >Old Password:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" required name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-3">
                        <label for="new_password" >New Password:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" required name="new_password" id="new_password" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-3">
                        <label for="c_password" >Confirm Password:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" required name="c_password" id="c_password" class="form-control">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </main>
    </div>
</div>


</body>
</html>
