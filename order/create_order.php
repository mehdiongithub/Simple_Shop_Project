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


    <style>
        #div{
            padding-left: 4px;
            bottom: 80px;
            float: right;
            width: 330px;
            height: 280px;
            border: 3px solid #73AD21;
            margin-top: 50px;
            margin-bottom: 100px;
            margin-right: 90px;
            margin-left: 80px;
        }
    </style>

</head>
<body>

    <?php
    require '../navbar/header.php';
    require '../database/database.php';


    ?>


<div class="container-fluid">
    <div class="row">


        <!--                CUSTOMER MODAL-->

        <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModal">Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="customer_form">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <input placeholder="Name" type="text" name="customer_name" class="form-control" id="customer_name" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="customer_phone" class="form-label">Phone Number</label>
                                <input type="text" placeholder="Phone Number" name="customer_phone" min="1" class="form-control" id="customer_phone">
                            </div>




                            <div class="mb-3">
                                <label for="customer_address" class="form-label">Address</label>
                                <input type="text" placeholder="Address" name="customer_address" min="1" class="form-control" id="customer_address">
                            </div>

                            <div id="response"></div>


                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="modalSubmit" id="modalSubmit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>

        <?php
        require '../navbar/leftbar.php';
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Create Product</h1>
            </div>
            <hr>
            <form action="index.php" id="order_form" method="post">
                <div class="row mt-4">
                    <div class="col-sm-2">
                        <label for="customer_id"><h3>Customer:</h3></label>
                    </div>
                    <div class="col-sm-7">
                        <select name="customer_id" id="customer_id" class="form-select">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button name="button" type="button"  class="customerButton btn  btn-primary"> + </button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-1">
                        <label for="country"><h5>Country:</h5></label>
                    </div>
                    <div class="col-sm-3">
                        <select name="country" id="country" class="form-select">
                            <option value="">Select country</option>
                        </select>
                    </div>


                    <div class="col-sm-1">
                        <label for="state"><h5>State:</h5></label>
                    </div>
                    <div class="col-sm-3">
                        <select name="state" id="state" class="form-select">
                            <option value="">Select State</option>
                        </select>
                    </div>


                    <div class="col-sm-1">
                        <label for="city"><h5>City:</h5></label>
                    </div>
                    <div class="col-sm-3">
                        <select name="city" id="city" class="form-select">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
                <hr>


                <div class="row">


                    <!--                    // Selecter of Product-->

                    <div class="col-sm-1">
                        <label for="product" class="form-label">Product</label>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select" id="product" name="select">
                            <option value="">Select product</option>
                        </select>
                    </div>


                    <!--                    //Price of Product-->


                    <div class="col-sm-1">
                        <label for="price" class="form-label">Price</label>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-select" id="price">
                            <option value="">Select Value</option>

                        </select>
                    </div>

                    <!--                    // Quantity of Product-->

                    <div class="col-sm-1">
                        <label for="quantity" class="form-label">Quantity</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="number" min="1">
                    </div>




                    <!--                    // Add Row Button-->

                    <div class="col-sm-2">
                        <button class="btn btn-primary" type="button" id="add"> + </button>
                    </div>
                </div>
                <hr>


                <div class="table-responsive mt-4">

                    <!--                    // Table of Super Store-->

                    <table id="myTable" class="table table-striped table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>Product </th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div id="div">
                    <div class="row">

                        <!--                            // Total of Bill-->


                        <div class="col-sm-5 mt-3">
                            <label for="total" class="form-label"><h4>Total</h4></label>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <input type="number" hidden name="total" class="form-control" id="total" min="1">
                            <h4 id="totalVal"></h4>

                        </div>

                    </div>
                    <div class="row">

                        <!--                            // Payment Of Bill-->

                        <div class="col-sm-5 mt-3">
                            <label for="paid" class="form-label"><h4>Payment</h4></label>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <input type="number" name="paid" class="form-control" id="paid">
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    <hr>
                    <div class="row">

                        <!--                            // Remaining Amount of Bill-->

                        <div class="col-sm-5 mt-3">
                            <label for="remaining" class="form-label"><h4>Remaining</h4></label>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <h4><b id="remainingVal"></b> </h4>

                            <input type="number" hidden name="remaining" class="form-control" id="remaining">
                        </div>
                    </div>
                </div>




                <div class="mt-4">
                    <button type="submit" id="order_form_submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </main>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>

        $(document).ready( function () {

            edits = document.getElementsByClassName('customerButton');
            Array.from(edits).forEach((elements)=>{
                elements.addEventListener('click',(e)=>{
                    $('#customerModal').modal('toggle')
                })
            })



            function loadCountry(type,country_id){
                $.ajax({
                    url :"../ajax/country_state_city.php",
                    type: "POST",
                    data : {
                        type : type,
                        id : country_id
                    },
                    success : function (data) {
                        if (type == 'state'){
                            $('#state').html(data);
                        }else if (type == 'city'){
                            $('#city').html(data);
                        }
                        else {
                            $('#country').append(data);

                        }
                    }
                })
            }

            loadCountry()

            $('#country').change(function () {
                var country = $('#country').val();
                loadCountry('state',country);
                $('#city').val('');
            })


            $('#state').change(function () {
                var state = $('#state').val();
                loadCountry('city',state);
            })

            function dataload(type, prod){
                $.ajax({
                    url : "../ajax/product_price.php",
                    type : "POST",
                    data : {
                        type : type ,
                        name : prod,
                    },


                    success : function (data){
                        if (type == 'price'){
                            $('#price').html(data)


                        }else {
                            $('#product').append(data);

                            var sum = 0;
                            var product = [];

                            //JQurey for add row in table

                            $('#add').click(function () {


                                var quantity = $('#number').val(); // quantity of product
                                var sel_product = $('#product option:selected').text() //Product Name
                                var sel_product_id = $('#product option:selected').val() //Product Name
                                var price = $('#price').val() // Pricee of product

                                // amount  of a product function

                                function amo(){
                                    return price*quantity;
                                }
                                var amount = amo();

                                var count = $('#myTable tr').length // length of table row

                                var id = $('#myTable tbody tr').length+1 // id of row

                                if (quantity == 0){
                                    // Quantity is empty alert this message
                                    alert('Please Enter Quantity')
                                }else if (sel_product == ''){
                                    // Product Selector is empty alert this message
                                    alert('Please Select Product')

                                }

                                else {
                                    // after add row in table it program will excuted
                                    if (product.includes(sel_product)) {

                                        // if product array include selected product it will excuted

                                        var table = document.getElementById('myTable'); // id of table

                                        //Nested loop for table

                                        for (var i = 0 ; i < count ; i++){

                                            // Loop for Table row

                                            var row = table.rows[i];
                                            var num = 0;
                                            var cellLength = row.cells.length;

                                            for (var j = 0 ; j < cellLength ; j++){

                                                // Loop for Table row td

                                                if (row.cells[j].innerText == sel_product){

                                                    // if for td value equal to selected product it will excuted

                                                    var addQuantity = row.cells[j + 1].innerText; // product td
                                                    var addAmount = row.cells[j + 3].innerText; // amount td

                                                    row.cells[j + 1].innerText = Number(addQuantity) + Number(quantity);

                                                    // for new value of td

                                                    var newQuantity = row.cells[j + 1].innerText; // new quan after added

                                                    // amount of product function

                                                    function amo(){
                                                        return price*Number(newQuantity);
                                                    }
                                                    var amount = amo();

                                                    row.cells[j + 3].innerText = amount; // amount of product after added

                                                    var newAmount = row.cells[j + 3].innerText; // new amount after added in td

                                                    function totVal() {
                                                        sum = sum - Number(addAmount); // old amount subtract
                                                        sum = sum + Number(newAmount); // new amount added
                                                        return sum;
                                                    }

                                                    var total = totVal()
                                                    $('#total').val(total);
                                                    $('#totalVal').text(total);

                                                }

                                            }

                                        }



                                        if ($('#add')) {

                                            // add button click these value will empty

                                            $('#number').val('')
                                            $('#price').val('')
                                            $('#product').val('')
                                        }

                                    } else {

                                        // append of table tbody row

                                        $('#myTable tbody').append("<tr>" +

                                            "<td>" + id + "<input type='hidden' name='id' value='" + id + "'> </td>" +
                                            "<td>" + sel_product + "<input type='hidden'  name='product_id[]' value='" + sel_product_id + "'> </td>" +
                                            "<td>" + quantity + "<input type='hidden' name='quantity[]' value='" + quantity + "'> </td>" +
                                            "<td>" + price +"</td>" +
                                            "<td>" + amount +"</td>" +
                                            "<td><button id='sub' class='btn btn-danger' type='button'> - </button> </td>" +
                                            "</tr>")

                                        product.push(sel_product);//if product array not have these value it will push

                                        var value = 0

                                        $('#myTable tbody').click('button[id="sub"]', function (e) {

                                            //click on subtract button one row will subtract

                                            tr = e.target.parentNode.parentNode; //table row
                                            value = tr.getElementsByTagName("td")[4].innerText; //amount of product
                                            productName = tr.getElementsByTagName("td")[1].innerText; //Product Name

                                            if(tr.parentNode) {

                                                // if condition for remove table row
                                                tr.parentNode.removeChild(tr);
                                                alert('are you sure to remove');

                                                for (var x = 0 ; x < product.length ; x++){

                                                    //for loop to find product name in product array

                                                    if (product[x] == productName){

                                                        // product array value equal to td value it will excuted

                                                        product.splice(x,1); // remove value from product array
                                                    }
                                                }


                                                function totval() {

                                                    // subtract amount from total value function

                                                    sum = sum - value;
                                                    return sum;
                                                }


                                                var total = totval();
                                                $('#total').val(total)
                                                $('#totalVal').text(total);

                                                var table = document.getElementById('myTable');

                                                var rowLength = table.rows.length;

                                                for (var i = 1; i < rowLength; i += 1) {
                                                    var row = table.rows[i];
                                                    var cellLength = row.cells.length;
                                                    for (var y = 0; y < cellLength; y += 1) {

                                                        if (y == 0) {
                                                            row.cells[y].innerText = i
                                                        }if (y == 1) {
                                                            row.cells[y].innerText.innerHTML = "TURALI";
                                                        }                                                }
                                                }
                                                id--;

                                            }


                                        })

                                        count++;
                                        if ($('#add')) {

                                            //click on add button these value will empty

                                            $('#number').val('')
                                            $('#price').val('')
                                            $('#product').val('')
                                        }

                                        function totVal() {

                                            // funtion of total value of bill

                                            sum = sum + amount;
                                            return sum;
                                        }

                                        var total = totVal()
                                        $('#total').val(total);
                                        $('#totalVal').text(total)



                                    }

                                }
                            })


                            $('#paid').on('input',function () {
                                var paid_amount = $(this).val()
                                function remaining(){
                                    return sum - paid_amount;
                                }
                                var remaining_amount = remaining();
                                $('#remaining').val(remaining_amount);
                                $('#remainingVal').text(remaining_amount);

                            })

                        }
                    }
                })
            }

            dataload()

            $('#product').on('change',function (){

                // product selector change it will give price value in price selector

                var prod = $('#product').val()
                dataload('price',prod)
            })


            function customerDataLoad(){
                $.ajax({
                    url : 'modal/customer_order.php',
                    type: "POST",
                    success:function (data) {
                        $('#customer_id').html(data);
                    }
                })
            }

            customerDataLoad()

            $('#modalSubmit').click(function (e) {
                var customer_name = $('#customer_name').val();
                var customer_address = $('#customer_address').val();
                var customer_phone = $('#customer_phone').val();
                e.preventDefault();

                if (customer_phone == '' || customer_name == '' || customer_address == ''){

                    $('#response').fadeIn();
                    $('#response').html('All field required.')

                }else {
                    $.ajax({
                        url : "modal/save_customer.php",
                        type:"POST",
                        data: $('#customer_form').serialize(),

                        success : function () {
                            $('#customer_form').trigger("reset")
                            $("#customerModal").modal('hide');
                            customerDataLoad()
                        }
                    })


                }

            })
            $('#order_form_submit').click(function (e){


                function customer_order_price(){

                    $.ajax({
                        url:'product_order_serverside/product_server.php',
                        type:"POST",
                        dataType:"JSON",
                        data:$('#order_form').serialize(),
                        success: function() {
                            $('#order_form').trigger("reset")

                        },

                    })


                }

                customer_order_price()
            })

        } );
    </script>


</body>
</html>
