<?php
include("dbconnection.php");

$sql = "SELECT * FROM user";
$result = mysqli_query($db, $sql);


function printTable()
{
    $sr = 1;
    global $result;
    if (mysqli_num_rows($result) > 0) {
        echo '
        <div class="table-responsive p-2 bg-white">
          <table class="table table-striped">
            <thead>
              <th>Booking ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact</th>
            </thead>
            <tbody>
            ';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row["sr"] . '</td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["address"] . '</td>
                    <td>' . $row["contact"] . '</td>

                </tr>';
            $sr += 1;
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Orders</title>
</head>

<body>

    <?php
    printTable();
    ?>

</body>

</html>