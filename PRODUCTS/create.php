<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "angproducts"; 

$connection = new mysqli($servername, $username, $password, $database);


$name = "";
$description = "";
$price = "";
$quantity = "";

$errorMessage = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    do {
        if ( empty($name) || empty($description) || empty($price) || empty($quantity)){
            $errorMessage = "All fields are required";
            
            break;
        }

        $sql = "INSERT INTO f4angproducts (name, description, price, quantity)" . "VALUES('$name', '$description', '$price', '$quantity')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Error: " . $connection->error;
            break;
        }

        $name = "";
        $description = "";
        $price = "";
        $quantity = "";

        header("location: /PRODUCTS/index.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .row.mb-3 {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 0.75rem 1.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            padding: 0.75rem 1.25rem;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            border-radius: 4px;
            padding: 0.75rem 1.25rem;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        .alert {
            margin-top: 1rem;
            border-radius: 4px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .btn-close {
            margin-left: 1rem;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Create New Product</h2>
        <?php
        if ( !empty($errorMessage)){
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                  ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo htmlspecialchars($description); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo htmlspecialchars($price); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/PRODUCTS/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
