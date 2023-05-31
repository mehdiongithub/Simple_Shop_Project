<?php
$conn = mysqli_connect('localhost','id19989713_root','Pakistan@123','id19989713_today_project');

$email = $_SESSION['email'];

$qurey = "Select * from users where email = '$email'";
$result = mysqli_query($conn, $qurey);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--// For Mobile show -->
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



    <style>
        .dropdown-item{
            text-align: center;
            font-family: Bahnschrift;
        }
        #p{
            color: darkblue;
            margin: 5px;
            font-size: 20px;
        }
        .dropdown {
            margin-left: auto;
        }
        #profile-pic{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .openModal{
            position: absolute;
            top: 22%;
            left: 55%;
            transform: translate(-15%, -15%);
            -ms-transform: translate(-5%, -5%);
            background-color: white;
            color: white;
            font-size: 16px;
            padding: 8px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        #profile-para{
            padding: 10px;
                 }
        #modaaImage{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        #navbarID{
            position: fixed;
            width: 100%;
                 }


    </style>
    </head>
<body>
<?php
while ($row = mysqli_fetch_assoc($result)){
?>
    <div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Profile Pic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form">
                    <?php
                    if ($row['photo'] == ''){
                        ?>
                            <h4>Please select image for your profile</h4>
                        <input id="uploadImage" type="file" accept="image/*" name="image" />
                        <br>
                        <div class="mt-4">
                        <input class="btn btn-success" id="image_save" type="submit" value="Upload">
                        </div>

                    <?php
                    }elseif (in_array($row['photo'],$row)){
                    ?>
                        <h4>Do you want to change your profile Image</h4>

                        <input id="uploadImage" type="file" accept="image/*" name="image" />
                    <div id="preview"><img src="/../login_system/photo_save/<?= $row['photo']?>" /></div><br>
                    <input class="btn btn-success" id="image_save" type="submit" value="Upload">
                    <?php
                    }else{
                    ?>
                        <h4>Please select image for your profile</h4>
                        <input id="uploadImage" type="file" accept="image/*" name="image" />
                        <br>
                        <div class="mt-4">
                            <input class="btn btn-success" id="image_save" type="submit" value="Upload">
                        </div>

                    <?php
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>

    <nav id="navbarID" class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="dropdown">
            <div class="row">

                <div class="col-sm-4">
                    <p id="p"><?php echo $row['name']?></p>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-6">
                <?php
                if ($row['photo'] == ''){
                    echo '<img src="/../navbar/logo/empty.jpg"
                         class="rounded-circle dropdown-toggle" height="40"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" width="50" >';
                }

                elseif (in_array($row['photo'],$row)){
                    ?>      <img src="/../login_system/photo_save/<?= $row['photo']?>"
                              class="rounded-circle dropdown-toggle" height="40"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" width="50" >

                    <?php
                                }
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><div class="mt-4">

                            <?php
                            if ($row['photo'] == ''){
                            ?>
                            <img src="/../navbar/logo/empty.jpg"
                         class="rounded-circle dropdown-toggle" height="40"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" width="50" >;
                                <?php
                            }elseif (in_array($row['photo'],$row)){
                            ?>
                            <img src="/../login_system/photo_save/<?= $row['photo']?>"
                              class="rounded-circle dropdown-toggle" height="50"  id="modaaImage" data-bs-toggle="dropdown" aria-expanded="false"  >
                                      <?php
                            }
                            ?>


                            <button  aria-label="Change profile picture" class="openModal">
                                <img src="/../navbar/logo/blackCamera.jpg"
                                     class="rounded-circle" height="30" width="20" >
                            </button>
                        </div></li>
                    <li><p class="dropdown-item mt-4"><?php echo $row['name'] ?></p></li>
                    <li><p class="dropdown-item"><?php echo $row['email'] ?></p></li>
                    <li><a class="dropdown-item btn" href="/../login_system/edit_account.php">Edit your account</a></li>
                    <li><hr></li>
                       <li><a class="dropdown-item btn" href="/../login_system/login.php">Add another account</a></li>
                    <li><a class="dropdown-item btn" href="/../login_system/logout.php">Logout</a></li>
              
                </ul>
            </div>
        </div>
        </div>


</nav>
<?php
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function () {

    function customerDataLoad(){
        $.ajax({
            url: "/../navbar/logo/photo_edit.php",
            type: "POST",
            success:function (data) {
                $('#dropdownMenuButton1').html(data);
            }
        })
    }

    customerDataLoad()


    $('.openModal').click(function () {
        $('#editPhotoModal').modal('show');

    })
    // function uploadPhoto(){
    //
    // }

    $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/../navbar/logo/photo_edit.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function()
            {
                // $("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function(data)
            {
                if(data=='invalid')
                {
                    // invalid file format.
                    $("#err").html("Invalid File !").fadeIn();
                }
                else
                {
                    // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    $("#form")[0].reset();
                }
                
                    $('#editPhotoModal').modal('hide')
                    window.location.href = '/../index.php'

            },
            error: function(e)
            {
                $("#err").html(e).fadeIn();
            }
        });
    }));


})

</script>

</body>
</html>


