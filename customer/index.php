<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../login_system/login.php");
    exit;
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

                <!--Customer Modal-->


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_customer.php" id="form" method="post" >

                <div class="modal-body">
                    <input type="hidden" name="cnoEdit" id="cnoEdit">


                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="customer_phone" class="form-label">Phone</label>
                        <input type="number" name="customer_phone" class="form-control" id="customer_phone" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="customer_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="customer_address" name="customer_address" aria-describedby="emailHelp">
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="modalSubmit"  class="btn btn-primary">Save changes</button>
                    </div>

                </div>
            </form>
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
                <h1 class="h2">Customer Details</h1>
            </div>
            <a href="create_customer.php" type="submit" class="btn btn-primary">+ NEW </a>
            <hr>
            <?php
            $sql = "Select * from customer";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if ($num > 0){
                ?>
                <div class="table-responsive mt-4">
                    <table id="myTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
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
                                <td> <?php echo $row['phone'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><button class='edit btn btn-sm btn-primary' id="<?php echo $row['cno'] ?>">Edit </button>
                                    <a href="delete_customer.php?id=<?php echo $row['cno'] ?>" class="btn btn-sm btn-danger">Delete</a>
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
    <h1>There is no record in Customer Table</h1> 
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
                name = tr.getElementsByTagName('td')[1].innerText;
                phone = tr.getElementsByTagName('td')[2].innerText;
                address = tr.getElementsByTagName('td')[3].innerText;
                console.log(name,phone,address);
                customer_name.value = name;
                customer_phone.value = phone;
                customer_address.value = address;
                cnoEdit.value = e.target.id;
                console.log(e.target.id);

                $('#editModal').modal('toggle')

            })
        })



        $('.modalSubmit').click(function () {
            var name = $('#customer_name').val();
            var address = $('#customer_address').val();
            var phone = $('#customer_phone').val();

            if (phone == '' || name == '' || address == ''){

                $('#response').fadeIn();
                $('#response').html('All field required.')

            }else {
                $.ajax({
                    url : "update_customer.php",
                    type:"POST",
                    data: $('#form').serialize(),
                    success : function (data) {
                        $('#form').trigger("reset")
                        $('#response').fadeIn();
                        $('#response').html(data)


                    }
                })
            }

        })

        $("#modalSubmit").click(function(){
            $("#editModal").modal('hide');
        });






    } );
</script>
</body>

</html>
