<?php
session_start();

?>
<!doctype html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qN6XG8qIZXuVhDMEUQ8mQL7gnJHBCj1k7qlI4Z7eHT5jGykZtU8mGPR5T6Anj6xR" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha384-gAEdBl+Io3ExFhF5mCUN+nhFUzxTChRCB/k3tb2jBiobUbzWVqejRHXHt7B6phXq" crossorigin="anonymous"></script>

</head>
<body style="background-color:#D7BDE2;">
<form  method ='POST' id="loginform" style="width:500px; margin:auto; margin-top:50px;">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">login</label>
    <input type="login" class="form-control" id="login" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass">
  </div>
  
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
<script>
    $(document).ready(function() {
        $("#loginform").on("submit", function(e) {
    
        var login=document.getElementById("login").value;
        var password=document.getElementById("pass").value;
        $.ajax({
        url: './php/loginControl.php',
        type: 'POST',
        data: {
            login: login,
            password: password
        },
        success: function(response) {
            console.log(response); // Add this line to log the response

            if (response === 'success') {
                // Redirect to the dashboard or desired page
                window.location.href = 'index.php';
            } else {
                // Show error message or perform other actions
                alert('Invalid login or password');
            }
        },
        error: function(xhr, status, error) {
            console.log('AJAX Error: ' + error);
        }
    });
    });});


    </script>
    </body></html>

       