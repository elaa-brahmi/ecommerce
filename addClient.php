<!doctype html>
<html>
    <head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
        <body>
            <form method="POST" id="clientform" class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6">
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
                <div class="mb-3">
                    <label for="adress" class="form-label">password</label>
                    <input type="text" class="form-control" id="password" >
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#clientform').on("submit",function(){
            var name=document.getElementById("name").value;
            var lastName=document.getElementById("lname").value;
            var email=document.getElementById("email").value;
            var phone=document.getElementById("phone").value;
            var adress=document.getElementById("adress").value;
            var password=document.getElementById("password").value;
            $.ajax({
                url:"./php/clientModule/addClient.php",
                type:"POST",
                data:{
                    name:name,
                    lastName:lastName,
                    email:email,
                    phone:phone,
                    adress:adress,
                    password:password
                },
                success:function(response){
                    console.log("success");
                    alert( 'client added successfully');
                    window.location.href="clients.php";
                },
                error:function(xhr,error,status){
                    console.log("error" ,error);
                    alert( 'error');
                }
            });
        }); });
        </script>