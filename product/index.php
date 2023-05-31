<?php
session_start();
if ((isset($_SESSION['loggedin']) == true) || isset($_SESSION['signup']) == true){



?>


<!doctype html>
<html lang="en">
<head>
    <title>Product Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    require '../navbar/header.php';
    require '../database/database.php';
    ?>
    <style>
            .h2{
            padding-left: 70px;
            padding-top: 70px;
        }

    </style>

</head>
<body>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_product.php" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <input type="hidden" name="pnoEdit" id="pnoEdit">


                    <div class="mb-3">
                        <label for="edit_product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="edit_product_name" name="edit_product_name" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="priceEdit" class="form-label">Price</label>
                        <input type="text" name="priceEdit" class="form-control" id="priceEdit" aria-describedby="emailHelp">
                    </div>




                    <div class="mb-3">
                        <div class="form-group">
                            Select image to upload:
                            <input type="file" name="photoEdit" id="photoEdit">

                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">


        <?php
        require '../navbar/leftbar.php';
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
            </div>
            <a href="create_product.php" type="submit" class="btn btn-primary">+ NEW </a>
            <hr>
            <?php
            $sql = "Select * from product";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if ($num > 0){
            ?>
            <div class="table-responsive mt-4">
                <table id="myTable" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $pno = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td> <?php echo $pno ?></td>
                            <td> <?php echo $row['name'] ?></td>
                            <td> <?php echo $row['price'] ?></td>
                            <td><div class="alb">
                                    <img src="upload_photo/<?= $row['photo']?>" width="50" height="50">
                                </div>
                            </td>
                            <td><button class='edit btn btn-sm btn-primary' id="<?php echo $row['pno'] ?>">Edit </button>
                                <a href="delete_product.php?id=<?php echo $row['pno'] ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>

                    <?php
                        $pno = $pno+1;
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <?php
            }else{
                echo '<div class="container mt-3">
  <div class="mt-4 p-3 bg-primary text-white rounded">
    <h1>There is no record in Product Table</h1> 
  </div>
</div>
';
            }
            ?>


            </div>
    </main>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

    $(document).ready( function () {
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((elements)=>{
            elements.addEventListener('click',(e)=>{
                console.log('edit',);
                tr = e.target.parentNode.parentNode;
                productName = tr.getElementsByTagName('td')[1].innerText;
                price = tr.getElementsByTagName('td')[2].innerText;
                photo = tr.getElementsByTagName('td')[3].innerText;
                console.log(productName,price,photo);
                edit_product_name.value = productName;
                priceEdit.value = price;
                photoEdit.value = photo;
                pnoEdit.value = e.target.id;
                console.log(e.target.id);

                $('#editModal').modal('toggle')

            })
        })


    } );
</script>
</body>

</html>
<?php

}else{
    header("location: ../login_system/login.php");
    exit;

}
?>