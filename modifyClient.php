<!doctype html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12dP2uRV0ITkFtvzsk1UcHOr6tqLTmKVE1OWBX3Ty27Awe6g" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha384-gAEdBl+Io3ExFhF5mCUN+nhFUzxTChRCB/k3tb2jBiobUbzWVqejRHXHt7B6phXq" crossorigin="anonymous"></script>
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
                    <input type="number" class="form-control" id="phone" >
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="adress" >
                </div>
                
            </div>
        </div>
        <button type="submit" class="btn btn-primary">save changes</button>
    </form>
    <script>
        $(document).ready(function(){
            var ClientId=new URLSearchParams (window.location.search).get('id');
            if(ClientId){
                $.ajax({
                    url:'./php/clientModule/getClientbyid.php',
                    type:'GET',
                    data:{id : ClientId},
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
            }
            $('#clientform').on("submit",function(e){
                e.preventDefault();
                var name=document.getElementById('name').value;
                var lastName=document.getElementById('lname').value;
                var email=document.getElementById('email').value;
                var phone=document.getElementById('phone').value;
                var adress=document.getElementById('adress').value;
                $.ajax ({
                    url:'./php/clientModule/modify.php',
                    type:'POST',
                    data:{
                        idClient:ClientId,
                        name:name,
                        lastName:lastName,
                        email:email,
                        phone:phone,
                        adress:adress
                    },
                    success:function(response){
                        console.log(response);
                        alert("client modified successufully");
                        window.location.href = 'clients.php';
                    },
                    error:function(xhr,status,error){
                        console.log('AJAX Error: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>