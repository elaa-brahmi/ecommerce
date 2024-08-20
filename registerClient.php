
<!doctype html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qN6XG8qIZXuVhDMEUQ8mQL7gnJHBCj1k7qlI4Z7eHT5jGykZtU8mGPR5T6Anj6xR" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha384-gAEdBl+Io3ExFhF5mCUN+nhFUzxTChRCB/k3tb2jBiobUbzWVqejRHXHt7B6phXq" crossorigin="anonymous"></script>

</head>
<body style="background-color:#D7BDE2;">
<form method="POST" id="clientform" class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="adress" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  <script>
    $(document).ready(function(){
        $("#clientform").on("submit",function (e){
            e.preventDefault();
            var name=document.getElementById("name").value;
            var lastName=document.getElementById("lname").value;
            var email=document.getElementById("email").value;
            var phone=document.getElementById("phone").value;
            var adress=document.getElementById("adress").value;
            var password=document.getElementById("password").value;
            
            $.ajax({
                url:"./php/clientModule/register.php",
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
                    
                    console.log(response);
                    if(response=="success"){
                        alert("welcome");
                        window.location.href="index.php";
                    }
                    else{
                        alert("something went wrong !");
                    }
                },
                error:function(xhr, status, error) {
            console.log('AJAX Error: ' + error);
        }
            });
        });

    });</script></body></html>





 