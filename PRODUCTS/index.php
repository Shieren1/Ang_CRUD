<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            background-color: #f8f9fa;
            color: #495057;
        }
        
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        
        .table {
            margin-top: 20px;
        }
        
        .btn-primary {
            margin-right: 10px;
        }
        
        .btn-sm {
            margin: 0 5px;
        }
        
        th, td {
            text-align: center;
        }

        th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Products</h2>
        <a class="btn btn-primary" href="/PRODUCTS/create.php" role="button">Create New Product</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "angproducts"; 

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM f4angproducts";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query: " . $connection->connect_error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[description]</td>
                            <td>$row[price]</td>
                            <td>$row[quantity]</td>
                            <td>$row[created_at]</td>
                            <td>$row[updated_at]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/PRODUCTS/update.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/PRODUCTS/delete.php?id=$row[id]'>Delete</a>
                            </td> 
                        </tr>
                        ";  
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
