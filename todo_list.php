<?php

include('./backend.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-4">
        <form method="post" action="./backend.php">
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="task">Task :</label>
                <input type="text" class="form-control" id="task" name="task" placeholder="Task">
            </div>
            <button type="submit" class="btn btn-success" id="create" name="create">Create Task</button>
        </form>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Task</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>' .
                            '<th scope="row">' . $row["id"] . '</th>';
                        if ($row["status"] === '1') {
                            echo '<td><input type="checkbox" onClick="update(' . $row["id"] . ')" checked></td>';
                        } else {
                            echo '<td><input type="checkbox" onClick="update(' . $row["id"] . ')"></td>';
                        }
                        echo '<td>' . $row["date"] . '</td>' .
                            '<td>' . $row["task"] . '</td>' .
                            '<td><a href="./backend.php?del=' . $row["id"] . '" class="btn btn-danger">Delete</a></td>' .
                            '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
        function update(id) {
            $.ajax({
                type: 'POST',
                url: 'backend.php',
                data: {
                    id: id
                },
                success: function(msg) {}
            })
            console.log(id);
        }
    </script>

</body>

</html>