<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'contact_db';


$con = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$stmt_upcoming = $con->prepare("SELECT id, name, number, email, date FROM contact_form WHERE confirmed = 0");
$stmt_upcoming->execute();
$result_upcoming = $stmt_upcoming->get_result();

$stmt_confirmed = $con->prepare("SELECT id, name, number, email, date FROM contact_form WHERE confirmed = 1");
$stmt_confirmed->execute();
$result_confirmed = $stmt_confirmed->get_result();

$stmt_upcoming->close();
$stmt_confirmed->close();
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <!-- Add the logout link here -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Upcoming Appointments</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>number</th>
                                    <th>email</th>
                                    <th>date</th>
                                    <th>Confirm</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result_upcoming->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id']); ?></td>
                                        <td><?= htmlspecialchars($row['name']); ?></td>
                                        <td><?= htmlspecialchars($row['number']); ?></td>
                                        <td><?= htmlspecialchars($row['email']); ?></td>
                                        <td><?= htmlspecialchars($row['date']); ?></td>
                                        <td>
                                            <form action="confirm.php" method="post">
                                                <input type="hidden" name="appointment_id" value="<?= htmlspecialchars($row['id']); ?>">
                                                <button type="submit" class="btn btn-primary" name="confirm">Confirm</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="delete.php" method="post">
                                                <input type="hidden" name="appointment_id" value="<?= htmlspecialchars($row['id']); ?>">
                                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Confirmed Appointments</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>number</th>
                                    <th>email</th>
                                    <th>date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result_confirmed->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id']); ?></td>
                                        <td><?= htmlspecialchars($row['name']); ?></td>
                                        <td><?= htmlspecialchars($row['number']); ?></td>
                                        <td><?= htmlspecialchars($row['email']); ?></td>
                                        <td><?= htmlspecialchars($row['date']); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
