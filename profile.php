<?php
session_start();
if(isset($_SESSION["role"])){
    $idClient=$_SESSION["id"];
}
?>
<!doctype html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
        <body>
            <form method="POST" id="clientform" class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6">
            <input type="hidden" class="form-control" id="idClient" value="<?php echo $idClient; ?>">
            </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" >
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="adress" >
                </div>
                
            </div>
        </div>
    </form>
    <a href="index.php"  class="btn btn-primary" >home </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var idClient=document.getElementById("idClient").value;
            console.log(idClient);
            $.ajax({
                url:"./php/clientModule/getClientbyid.php?id="+idClient,
                type:"GET",
                
                success: function(data){
                        var client=JSON.parse(data);
                        if (client) {
                            $('#name').val(client.name);
                            $('#lname').val(client.lastName);
                            $('#email').val(client.email);
                            $('#phone').val(client.phone);
                            $('#adress').val(client.adress);
                        } else {
                            alert('Client not found');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }

            });

        });





    </script>