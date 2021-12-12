 <?php
include("dbconnection.php");
$error = "";
$show_modal = false;

$modalHeader = "Ordered!";
$modalBody = " ";
echo 'test1';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['buy'])) {
   echo 'test';
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $contact=(int)$contact;

    $query = "INSERT INTO `user` (`sr`, `name`, `address`, `contact`) VALUES (NULL, '$name', '$address', '$contact');";

    if (mysqli_query($db, $query)) {
      header('location: orders.php');
    } else {
      echo mysqli_error($db);
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .shop {
            display: flex;
            padding: 2rem;
            justify-content: center;
        }

        .img-holder img {
            max-width: 300px;
        }

        .info-box {
            padding: 0rem 2rem;
        }

        .btn {
            background: #709cce;
            padding: 0.6rem;
            border: none;
            color: #fff;
            width: 100%;
            text-decoration: none;
        }

        #buyform {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="shop">
        <div class="img-holder">
            <img src="./img/watch.jpeg" alt="Analog Watch">
        </div>
        <div class="info-box">
            <h2 class="title">Analog Watch</h2>
            <h3 class="title">Daniel Klein</h3>
            Specs:
            <ul>
                <li>Water Resistant</li>
                <li>Shiny look</li>
                <li>Long battery life</li>
            </ul>
            <a class="btn" href="#buyform">Buy Now</a>
        </div>
    </div>
    <form action="index.php" id="buyform" method="POST">
        <label for="name">Enter Name: </label>
        <input type="text" id="name" name="name" /><br>
        <label for="address">Enter Address: </label>
        <input type="text" id="address" name="address" /><br>
        <label for="contact">Enter Contact: </label>
        <input type="number" id="contact" name="contact" /><br>
        <input type="submit" value="Buy" class="btn" name="buy"/>
    </form>
</body>

</html>