<?php
session_start();
include 'db_connect.php'; // your DB connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Simple query for testing (plain text passwords)
    $stmt = $conn->prepare("SELECT id, name, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Compare plain text password (for demo only)
        if ($password === $row['password']) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            header("Location: admin.html");
            exit;
        } else {
            echo "<script>alert('❌ Invalid password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ No account found with that email.'); window.history.back();</script>";
    }
}
?>
