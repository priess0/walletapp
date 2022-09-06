<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Nákupy</title>
  </head>
  <body>

    <?php
      include('connect.php');
      include('navbar.php');
    ?>

    <h1>Seznam nákupů</h1>

    <div class="row mt-5">
      <?php
      /*
        $q= "SELECT * FROM purchases";
        $query=mysqli_query($con,$q);
        while ($qq=mysqli_fetch_array($query))
        {
        */
      $q="SELECT *
      FROM payers
      INNER JOIN purchases
      ON payers.payer_id = purchases.payer_id
      INNER JOIN categories
      ON categories.category_id = purchases.category_id";
      $query=mysqli_query($con,$q);
      while ($qq=mysqli_fetch_array($query))
      {

      ?>
      <div class="card col-4">
        <div class="card-body">
          <p class="font-weight-bold card-title">ID nákupu</p>
          <span type="text" name="purchase-id"><?php echo $qq['purchase_id'] ?></span>
          <p class="font-weight-bold">Cena nákupu</p>
          <span type="text" name="purchase-value"><?php echo $qq['purchase_value'] ?></span>
          <p class="font-weight-bold">Název nákupu</p>
          <span type="text" name="purchase-name"><?php echo $qq['purchase_name'] ?></span>
          <p class="font-weight-bold">Datum nákupu</p>
          <span type="text" name="purchase-date"><?php echo $qq['purchase_date'] ?></span>
          <p class="font-weight-bold">Plátce</p>
          <span type="text" name="payer-id"><?php echo $qq['payer_name']; ?></span>
          <p class="font-weight-bold">Kategorie</p>
          <span type="text" name="category-id"><?php echo $qq['category_name'] ?></span>
          <br>
          <a href="edit-purchase.php" class="btn btn-primary">Upravit</a>
          <a href="delete-purchase.php" class="btn btn-danger">Smazat</a>
        </div>

      </div>

    <?php
  }
     ?>
   </div>
  </body>
</html>
