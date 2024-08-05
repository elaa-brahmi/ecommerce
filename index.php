<?php
session_start();
//require './php/authentification.php';
?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body style="background-color: #eeebe8;">
<nav style="border-radius:20px; width:700px; margin:auto; margin-top:25px;  background-color: #D8C3A5;">
    <div class="nav-wrapper" style="font-weight:bold; font-size:35px; color:black;">
      <a href="#" class="brand-logo"><img src="img/logo.png" style="width:85px; margin-top:-10px;"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down" >
        <li><a href="">home</a></li>
        <?php
         if(isset($_SESSION["username"]) && $_SESSION["username"] =="ela"){
           echo '<li><a href="clients.php">see clients</a></li>';}
        ?>
        <li><a href="about.html">about</a></li>
        <li><a href="cart.php">cart</a></li>
        <li><a href="profile.php">profile</a></li>
      </ul>
    </div>
  </nav>
   <div class="div1">
    <p>
        <h1>SHOP ALL</h1>
        Clean, vegan, cruelty-free skincare
    </p>
    </div>
    <div class="div2">
        <table id="tabproduct" style="margin-top:40px;">
            <thead>
            <tr>
            <th>id product</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>picture</th>
                <th>state</th>
            </tr>
         </thead><tbody></tbody>
</table>
    </div>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            var table=$('#tabproduct').DataTable({
                "ajax":{
                    "url":"./php/productModule/getproduct.php",
                    "type":"POST",
                    "dataType":"json"
                },
                "columns":[
                    {"data":"idProduct"}
                    {"date":"name"},
                    {"date":"description"},
                    {"date":"price"},
                    {"date":"picture",
                        "render": function(data, type, row) {
                            return "<img src='"+data+"' width='50'>";  
                        }
                    },
                    {"date":"etat",
                        "render":function(data,type,row){
                            if(data== "add to bag"){
                                return "<button class='add-to-bag'>add to bag</button>";

                            }
                            else{
                                return "coming soon;"
                            }
                        }
                    }
                ]
            });
            $('#tabproduct').on('click','.add-to-bag',function(){
                var id=$(this).data('idProduct');
                $.ajax({
                    url:"./php/productModule/commander.php",
                    type:"POST",
                    data:{
                        idProduct:id
                    },
                    sucess:function(response){
                        alert("added successufully");

                    },
                    error: function(xhr, status, error) {
                                    console.log('AJAX Error: ' + error);
                                }
                });
            });
        });
        </script>
</body>
</html>






