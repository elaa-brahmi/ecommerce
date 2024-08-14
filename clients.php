<?php
    session_start();
?>
 <!doctype html>
 <html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
</head>
<body><br>
<a href="addClient.php"  class="btn btn-primary" >add a client </a>
<a href="index.php"  class="btn btn-primary" >home </a>
<section class="mt-section" >
        <div class="row">
            <table id="tabclient" class="table table-striped"> <thead><tr>
                <th>id Client</th>
                <th>name</th>
                <th>Last name</th>
                <th>email</th>
                <th>phone</th>
                <th>adress</th>
                <th>Actions</th>
</tr></thead>
<tbody></tbody>
</table>
        </div>
    </section>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3e3edd1075.js" crossorigin="anonymous"></script>
    <script>
     $(document).ready(function(){
        var table=$('#tabclient').dataTable({
            "ajax":{
                "url":"./php/clientModule/getClient.php",
                "type":"POST",
                "dataType":"json"
            },
            "columns":[
                {'data' : 'idClient'},
                {'data' : 'name'},
                {'data' : 'lastName'},
                {'data' : 'email'},
                {'data' : 'phone'},
                {'data' : 'adress'},
                {
                'data': null,
                "render": function(data, type, row) {
                    console.log(row.idClient);
                    return `
                        <a href='modifyClient.php?id=${row.idClient}' class='btn btn-success'>Modify Client</a> 
                        <a href='php/clientModule/deleteClient.php?id=${row.idClient}' class='btn btn-danger'>Delete Client</a>
                    `;
                }
            }
            ]
        });
       
            
    });
    
</script>
</body>
</html>