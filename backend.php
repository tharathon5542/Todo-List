<?php
include('./server_config.php');

$sql = "SELECT * FROM todolist";
$result = $conn->query($sql);

if (isset($_POST['create'])) {
    $date = $_POST['date'];
    $task = $_POST['task'];

    $sql = "INSERT INTO todolist (date, task, status) VALUES('$date', '$task', '0')";

    if ($conn->query($sql) === TRUE) {
        header("location: ./todo_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM todolist WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("location: ./todo_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "UPDATE todolist SET status = CASE WHEN status = 1 THEN 0 ELSE 1 END WHERE id = $id ";

    if ($conn->query($sql) === TRUE) {
        header("location: ./todo_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
