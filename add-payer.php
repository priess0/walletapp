<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Přidat uživatele</title>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <h1>Přidat uživatele</h1>
    <form action="add-payer.php" method="post">
      <p>Jméno uživatele</p>
      <input type="text" name="payer-name">
      <p>Barva</p>
      <input type="color" name="payer-color">
      <button type="submit" name="button">Přidat</button>

    </form>

    <?php
      if(isset($_POST["button"])) {
        include("connect.php");
        $payer_name=$_POST["payer-name"];
        $payer_color=$_POST["payer-color"];

        $query="INSERT into payers(payer_name,payer_color)values('$payer_name','$payer_color')";

        mysqli_query($con,$query);
        header("location:index.php");
      }
     ?>
  </body>
</html>
