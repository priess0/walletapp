<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Kategorie</title>
  </head>
  <body>

    <?php
      include('connect.php');
      include('navbar.php');
    ?>

    <h1>Karty uživatelů</h1>

    <div class="row mt-5">
      <?php
        $q= "SELECT * FROM categories";
        $query=mysqli_query($con,$q);
        while ($qq=mysqli_fetch_array($query))
        {

      ?>
      <div class="card col-4">
        <div class="card-body">
          <p class="font-weight-bold card-title">ID kategorie</p>
          <span type="text" name="category-id"><?php echo $qq['category_id'] ?></span>
          <p class="font-weight-bold">Název kategorie</p>
          <span type="text" name="category-name"><?php echo $qq['category_name'] ?></span>
          <br>
          <a href="edit-category.php" class="btn btn-primary">Upravit</a>
          <a href="delete-category.php" class="btn btn-danger">Smazat</a>
        </div>

      </div>

    <?php
  }
     ?>
   </div>
  </body>
</html>
