<body>
<div id="main">
    <div id="header">
        <h1>JSON DATA</h1>
    </div>
    <div id="load_data">

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$.ajax({
    url : "practice.php",
    type:"POST",
    success : function(data){
        console.log(data);
    }
})
</script>
</body>