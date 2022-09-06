<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Uživatelé</title>
  </head>
  <body>

    <?php
      include('connect.php');
      include('navbar.php');
    ?>

    <h1>Karty uživatelů</h1>

    <div class="row mt-5">
      <?php
        $q= "SELECT * FROM payers";
        $query=mysqli_query($con,$q);
        while ($qq=mysqli_fetch_array($query))
        {

      ?>
      <div class="card col-4">
        <div class="card-body">
          <p class="font-weight-bold card-title">ID uživatele</p>
          <span type="text" name="payer-id"><?php echo $qq['payer_id'] ?></span>
          <p class="font-weight-bold">Jméno uživatele</p>
          <span type="text" name="payer-name"><?php echo $qq['payer_name'] ?></span>
          <p class="font-weight-bold">Barva</p>
          <div style="background-color:<?php echo $qq['payer_color'] ?>; width:100px; height:50px;"><?php echo $qq['payer_color'] ?></div>
          <br>
          <a href="edit-payer.php" class="btn btn-primary">Upravit</a>
          <a href="delete-payer.php" class="btn btn-danger">Smazat</a>
        </div>

      </div>

    <?php
  }
     ?>
   </div>
  </body>
</html>
