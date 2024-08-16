<!doctype html>
<html>
    <head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
        <body>
            <form method="POST" id="productform" class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">product's name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control" id="description" >
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" class="form-control" id="price" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="quantity" class="form-label">quantity</label>
                    <input type="text" class="form-control" id="quantity" >
                </div>
                <div class="mb-3">
                    <label for="etat" class="form-label">etat</label>
                    <input type="text" class="form-control" id="etat" >
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">picture</label>
                    <input type="file" class="form-control" id="picture" >
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
            $('#productform').on("submit",function(e){
                e.preventDefault();
                var name=document.getElementById("name").value;
                var description=document.getElementById("description").value;
                var price=document.getElementById("price").value;
                var quantity=document.getElementById("quantity").value;
                var etat=document.getElementById("etat").value;
                var picture=document.getElementById("picture").value;
                $.ajax({
                    url:"./php/productModule/addProduct.php",
                    type:"POST",
                    data:{
                        name:name,
                        description:description,
                        price:price,
                        quantity:quantity,
                        etat:etat,
                        picture:picture

                    },
                    success:function(response){
                        console.log(response);
                        alert("product added successfully");
                        window.location.href="index.php";
                    },
                    error:function(xhr,status,error){
                        alert("error");
                    }

                });
            });

        });
    </script>