<?php
session_start(); 


$con = mysqli_connect("localhost", "root", "", "contact_db");


if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// verify if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch admin credentials from the database
    $query = "SELECT password FROM admin_user WHERE admin_username = ?";
    $stmt = $con->prepare($query);

    // Check if the query was prepared successfully
    if (!$stmt) {
        die("Query Error: " . $con->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a record was found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $db_password = $row['password'];

        // Validate credentials
        if ($password === $db_password) {
            // Authentication successful, start session and redirect to the admin dashboard
            $_SESSION["admin_logged_in"] = true;
            header("Location: admin.php");
            exit();
        } else {
            // Authentication failed, display an error message
            $error_message = "Invalid username or password";
        }
    } else {
        // Authentication failed, display an error message
        $error_message = "Invalid username or password";
    }

    $stmt->close();
}

$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Admin Login</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
